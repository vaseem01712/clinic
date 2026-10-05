<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['patient_name','patient_image','rating','review','is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
