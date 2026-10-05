<?php
namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Services\AccountAccessService;
use App\Services\AuditLogService;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Filament\Notifications\Notification;

class CreateDoctor extends CreateRecord
{
    protected static string $resource = DoctorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existing=User::where('email',$data['email'])->first();
        if($existing && !$existing->isDoctor()) {
            throw ValidationException::withMessages(['data.email'=>'A non-doctor account already uses this email.']);
        }

        if($existing) {
            $user=$existing;
        } else {
            $user=User::create([
                'name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone']??null,
                'password'=>Hash::make(Str::random(48)),'role'=>'doctor',
            ]);
        }
        $data['user_id']=$user->id;
        return $data;
    }

    protected function afterCreate(): void
    {
        $user=$this->record->user;
        app(AuditLogService::class)->record('admin_created_doctor',$this->record,auth()->user());
        if($user) { try { app(AccountAccessService::class)->sendSetup($user,'Doctor Portal'); Notification::make()->title('Doctor created and setup email sent')->success()->send(); } catch (\Throwable $e) { report($e); Notification::make()->title('Doctor created, but email could not be sent')->warning()->send(); } }
    }
}
