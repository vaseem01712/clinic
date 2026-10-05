<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SpecialtyFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement([
            'Cardiology','Neurology','Orthopedics','Dentistry','Dermatology',
            'Pediatrics','General Medicine','Psychiatry','Ophthalmology','ENT',
        ]);
        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.Str::random(4),
            'icon' => 'heroicon-o-heart',
            'description' => $this->faker->sentence(14),
            'is_active' => true,
        ];
    }
}
