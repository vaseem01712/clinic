<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalReport extends Model
{
    protected $fillable = [
        'patient_id','doctor_id','appointment_id','title','test_type',
        'description','report_date','file_path','file_name','mime_type',
        'file_size','status','sent_at',
    ];

    protected $casts = ['report_date' => 'date', 'sent_at' => 'datetime'];

    public function patient(): BelongsTo { return $this->belongsTo(User::class, 'patient_id'); }
    public function doctor(): BelongsTo { return $this->belongsTo(Doctor::class); }
    public function appointment(): BelongsTo { return $this->belongsTo(Appointment::class); }
}
