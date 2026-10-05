<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public User $user, public string $resetUrl, public string $portalLabel = 'Portal') {}
    public function build(): self
    {
        return $this->subject("Reset your {$this->portalLabel} password — MediCare")
            ->view('emails.password-reset');
    }
}
