<?php

namespace App\Services;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserNotificationService
{
    public function send(User $user, string $type, string $title, string $message, string $actionUrl): void
    {
        try {
            Notification::create([
                'user_id' => $user->id,
                'type' => $type,
                'title' => $title,
                'message' => $message,
                'action_url' => $actionUrl,
            ]);
        } catch (\Throwable $exception) {
            Log::warning('Could not save user notification', ['user_id' => $user->id, 'error' => $exception->getMessage()]);
        }

    }
}