<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => fake()->words(3, true),
            'slug' => Str::slug(fake()->sentence()),
            'deskripsi' => fake()->text(),
            'link_embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/bVsyHTDANNY?si=1ctay382mPQJWjgu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'course_id' => Course::factory()
        ];
    }
}
