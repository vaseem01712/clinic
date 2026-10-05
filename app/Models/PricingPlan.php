<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = ['name','price','billing_period','features','is_recommended','sort_order'];
    protected $casts = ['features' => 'array', 'is_recommended' => 'boolean', 'price' => 'decimal:2'];
}
