<?php
namespace App\Services;

use App\Mail\AccountSetupMail;
use App\Mail\PasswordResetMail;
use App\Models\PasswordSetupToken;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AccountAccessService
{
    public function issueSetupToken(User $user, int $minutes = 60): string
    {
        $user->passwordSetupTokens()->delete();
        $raw = Str::random(64);
        PasswordSetupToken::create([
            'user_id' => $user->id,
            'token_hash' => hash('sha256', $raw),
            'expires_at' => now()->addMinutes($minutes),
        ]);

        return URL::route('password.setup', ['token' => $raw, 'email' => $user->email]);
    }

    public function sendSetup(User $user, string $portalLabel): void
    {
        Mail::to($user->email)->send(
            new AccountSetupMail($user, $this->issueSetupToken($user), $portalLabel)
        );
    }

    public function sendReset(User $user, string $portalLabel): void
    {
        Mail::to($user->email)->send(
            new PasswordResetMail($user, $this->issueSetupToken($user, 30), $portalLabel)
        );
    }

    public function consume(string $rawToken, User $user): bool
    {
        $token = $user->passwordSetupTokens()
            ->where('token_hash', hash('sha256', $rawToken))
            ->where('expires_at', '>', now())
            ->first();

        if (! $token) return false;
        $token->delete();
        return true;
    }
}
