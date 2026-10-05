<?php
namespace Database\Factories;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        $name = 'Dr. '.$this->faker->name();
        return [
            'specialty_id' => Specialty::inRandomOrder()->first()?->id ?? Specialty::factory(),
            'name' => $name,
            'slug' => Str::slug($name).'-'.Str::random(4),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'experience_years' => $this->faker->numberBetween(3, 25),
            'education' => 'MBBS, MD - '.$this->faker->randomElement(['AIIMS Delhi','Harvard Medical School','JIPMER','CMC Vellore']),
            'biography' => $this->faker->paragraph(4),
            'certifications' => [$this->faker->jobTitle(), 'Board Certified'],
            'languages' => $this->faker->randomElements(['English','Hindi','Spanish','French'], 2),
            'consultation_fee' => $this->faker->randomElement([500,800,1000,1500,2000]),
            'rating' => $this->faker->randomFloat(1, 4, 5),
            'location' => $this->faker->city(),
            'social_links' => ['linkedin' => '#', 'twitter' => '#'],
            'is_active' => true,
        ];
    }
}
