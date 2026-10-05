<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AccountAccessService;
use App\Services\UserNotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordSetupController extends Controller
{
    public function show(Request $request)
    {
        $user = User::where('email',$request->query('email'))->first();
        abort_unless($user && $user->passwordSetupTokens()->where('token_hash',hash('sha256',$request->query('token','')))->where('expires_at','>',now())->exists(), 404);
        return view('auth.set-password', ['email'=>$user->email,'token'=>$request->query('token'),'portal'=>$user->isDoctor()?'Doctor Portal':'Patient Dashboard']);
    }

    public function store(Request $request, AccountAccessService $access)
    {
        $data = $request->validate([
            'email'=>['required','email','exists:users,email'],
            'token'=>['required','string'],
            'password'=>['required','string','min:10','confirmed'],
        ]);
        $user = User::where('email',$data['email'])->firstOrFail();
        abort_unless($access->consume($data['token'],$user), 422, 'This setup link is invalid or expired.');
        $user->forceFill(['password'=>Hash::make($data['password']),'email_verified_at'=>$user->email_verified_at ?: now()])->save();
        return redirect()->route($user->isDoctor() ? 'doctor.login' : 'login')->with('success','Your password has been set. You can now sign in.');
    }

    public function forgotForm(string $portal) { return view('auth.forgot-password', compact('portal')); }

    public function forgot(Request $request, AccountAccessService $access, UserNotificationService $notifications)
    {
        $data=$request->validate(['email'=>['required','email']]);
        $user=User::where('email',$data['email'])->first();
        if ($user && (($request->route('portal')==='doctor' && $user->isDoctor()) || ($request->route('portal')==='patient' && $user->isPatient()))) {
            $access->sendReset($user, $user->isDoctor()?'Doctor Portal':'Patient Dashboard');
            $notifications->send($user, 'security', 'Password reset requested', 'A password reset link was requested for your account.', $user->isDoctor() ? route('doctor.login') : route('login'));
        }
        return back()->with('success','If that account exists, a secure reset link has been sent.');
    }
}
