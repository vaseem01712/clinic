<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'doctor_id'=>['required','exists:doctors,id'],
            'specialty_id'=>['nullable','exists:specialties,id'],
            'service_id'=>['nullable','exists:services,id'],
            'appointment_date'=>['required','date','after_or_equal:today'],
            'appointment_time'=>[
                'required','date_format:H:i',
                Rule::unique('appointments')->where(fn($q)=>$q->where('doctor_id',$this->doctor_id)->where('appointment_date',$this->appointment_date)->whereIn('status',['pending','confirmed'])),
            ],
            'patient_name'=>['required','string','max:255'],
            'patient_email'=>['required','email','max:255'],
            'patient_phone'=>['nullable','string','max:30'],
            'message'=>['nullable','string','max:1000'],
            'device_token'=>['nullable','string','max:4096'],
        ];
    }
    public function messages(): array { return ['appointment_time.unique'=>'This slot is already booked. Please choose another time.']; }
}
