<?php
namespace Database\Factories;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->randomElement([
            'Book Appointment','Home Doctor Visit','Tele-Health Consultation',
            'Medical Consultation','Emergency Care','Health Checkup Package',
            'Vaccination','Diagnostic Lab Tests',
        ]);
        return [
            'specialty_id' => Specialty::inRandomOrder()->first()?->id,
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::random(4),
            'icon' => 'heroicon-o-clipboard',
            'short_description' => $this->faker->sentence(12),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->randomElement([0,300,500,750,1200]),
            'is_active' => true,
        ];
    }
}
