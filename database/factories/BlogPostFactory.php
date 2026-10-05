<?php
namespace Database\Factories;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'blog_category_id' => BlogCategory::inRandomOrder()->first()?->id,
            'author' => $this->faker->name(),
            'title' => $title,
            'slug' => Str::slug($title).'-'.Str::random(4),
            'excerpt' => $this->faker->sentence(20),
            'content' => '<p>'.implode('</p><p>', $this->faker->paragraphs(6)).'</p>',
            'is_published' => true,
            'published_at' => now()->subDays($this->faker->numberBetween(1, 60)),
        ];
    }
}
