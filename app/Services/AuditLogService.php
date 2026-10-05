<?php
namespace App\Services;
use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuditLogService
{
    public function record(string $action, ?Model $target=null, ?User $user=null, array $metadata=[]): AuditLog
    {
        return AuditLog::create([
            'user_id'=>$user?->id ?? auth()->id(),
            'action'=>$action,
            'target_type'=>$target ? $target::class : null,
            'target_id'=>$target?->getKey(),
            'metadata'=>$metadata,
            'ip_address'=>request()->ip(),
        ]);
    }
}
