<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DeviceToken;
use App\Services\AccountAccessService;
use App\Services\UserNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class DoctorAuthController extends Controller
{
    public function showLogin() { return view('doctor.auth.login'); }

    public function login(Request $request, UserNotificationService $notifications)
    {
        $data = $request->validate(['email'=>['required','email'],'password'=>['required','string']]);
        $key = Str::lower($data['email']).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors(['email'=>'Too many attempts. Please try again later.'])->onlyInput('email');
        }

        $user = User::where('email', $data['email'])->where('role','doctor')->first();
        if (! $user || ! $user->doctor || ! $user->doctor->is_active || ! Auth::attempt(['email'=>$data['email'],'password'=>$data['password']], $request->boolean('remember'))) {
            RateLimiter::hit($key, 60);
            return back()->withErrors(['email'=>'The doctor credentials are incorrect or the account is inactive.'])->onlyInput('email');
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();
        $token = $request->input('device_token');
        if (is_string($token) && $token !== '' && strlen($token) <= 4096) {
            DeviceToken::updateOrCreate(['token_hash' => hash('sha256', $token)], [
                'user_id' => $user->id, 'token' => $token, 'platform' => 'web', 'last_seen_at' => now(),
            ]);
        }
        $notifications->send($user, 'security', 'New sign-in', 'Your doctor account was just signed in to.', route('doctor.dashboard'));
        return redirect()->intended(route('doctor.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('doctor.login');
    }
}
