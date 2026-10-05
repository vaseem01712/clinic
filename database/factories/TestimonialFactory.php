<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'patient_name' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(4, 5),
            'review' => $this->faker->paragraph(3),
            'is_active' => true,
        ];
    }
}
