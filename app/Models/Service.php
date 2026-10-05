<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'specialty_id','title','slug','icon','image','short_description',
        'description','price','is_active',
    ];

    protected $casts = ['is_active' => 'boolean', 'price' => 'decimal:2'];

    public function specialty(): BelongsTo { return $this->belongsTo(Specialty::class); }
    public function appointments(): HasMany { return $this->hasMany(Appointment::class); }

    public function getRouteKeyName(): string { return 'slug'; }
}
