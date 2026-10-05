<?php
namespace App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource;
use Filament\Resources\Pages\EditRecord;
use App\Services\AuditLogService;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $existing=User::where('email',$data['email'])->where('id','!=',$this->record->user_id)->first();
        if($existing) throw ValidationException::withMessages(['data.email'=>'Another account already uses this email.']);
        return $data;
    }

    protected function afterSave(): void
    {
        $doctor=$this->record;
        if($doctor->user) $doctor->user->update(['name'=>$doctor->name,'email'=>$doctor->email,'phone'=>$doctor->phone]);
        app(AuditLogService::class)->record('admin_updated_doctor',$doctor,auth()->user());
    }
}
