<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id','specialty_id','department','name','slug','email','phone','photo',
        'experience_years','education','license_registration','biography','certifications','languages',
        'consultation_fee','rating','location','social_links','is_active',
    ];

    protected $casts = [
        'certifications' => 'array','languages' => 'array','social_links' => 'array',
        'is_active' => 'boolean','consultation_fee' => 'decimal:2','rating' => 'decimal:2',
    ];

    public function specialty(): BelongsTo { return $this->belongsTo(Specialty::class); }
    public function user(): BelongsTo { return $this->belongsTo(User::class); }
    public function appointments(): HasMany { return $this->hasMany(Appointment::class); }
    public function availabilities(): HasMany { return $this->hasMany(DoctorAvailability::class); }
    public function reports(): HasMany { return $this->hasMany(MedicalReport::class); }
    public function medicalRecords(): HasMany { return $this->hasMany(MedicalRecord::class); }

    public function getRouteKeyName(): string { return 'slug'; }
}
