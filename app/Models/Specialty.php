<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','slug','icon','description','image','is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function doctors(): HasMany { return $this->hasMany(Doctor::class); }
    public function services(): HasMany { return $this->hasMany(Service::class); }
    public function appointments(): HasMany { return $this->hasMany(Appointment::class); }

    public function getRouteKeyName(): string { return 'slug'; }
}
