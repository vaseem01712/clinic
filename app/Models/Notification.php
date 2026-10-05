<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Notification extends Model
{
    protected $fillable = ['user_id','type','title','message','action_url','read_at'];
    protected $casts = ['read_at' => 'datetime'];

    protected static function booted(): void
    {
        static::created(function (self $notification): void {
            try {
                $user = $notification->user;
                if ($user) {
                    app(\App\Services\FirebaseMessagingService::class)->sendToUser(
                        $user,
                        $notification->title,
                        $notification->message,
                        ['type' => $notification->type, 'url' => $notification->action_url ?? '']
                    );
                }
            } catch (\Throwable $exception) {
                Log::warning('Firebase notification dispatch failed', ['notification_id' => $notification->id, 'error' => $exception->getMessage()]);
            }
        });
    }

    public function user(): BelongsTo { return $this->belongsTo(User::class); }
}
