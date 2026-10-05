<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\DeviceToken;
use App\Models\User;
use App\Services\UserNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    public function create() { return view('auth.login'); }
    public function store(Request $request, UserNotificationService $notifications)
    {
        $credentials=$request->validate(['email'=>['required','email'],'password'=>['required','string']]);
        $key=Str::lower($credentials['email']).'|'.$request->ip();
        if(RateLimiter::tooManyAttempts($key,5)) return back()->withErrors(['email'=>'Too many attempts. Please try again later.'])->onlyInput('email');
        if(!Auth::attempt(['email'=>$credentials['email'],'password'=>$credentials['password'],'role'=>'patient'],$request->boolean('remember'))){
            RateLimiter::hit($key,60);
            return back()->withErrors(['email'=>'The provided patient credentials do not match our records.'])->onlyInput('email');
        }
        RateLimiter::clear($key);
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user) {
            $this->saveDeviceToken($request, $user);
            $notifications->send($user, 'security', 'New sign-in', 'Your patient account was just signed in to.', route('dashboard'));
        }
        return redirect()->intended(route('dashboard'));
    }
    public function destroy(Request $request)
    {
        Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    private function saveDeviceToken(Request $request, User $user): void
    {
        $token = $request->input('device_token');
        if (! is_string($token) || $token === '' || strlen($token) > 4096) return;
        DeviceToken::updateOrCreate(['token_hash' => hash('sha256', $token)], [
            'user_id' => $user->id, 'token' => $token, 'platform' => 'web', 'last_seen_at' => now(),
        ]);
    }
}
