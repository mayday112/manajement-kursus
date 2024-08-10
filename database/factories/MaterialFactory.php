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
            'link' => 'https://drive.google.com/file/d/1qPDKMS9QmpztyjxHDXlNJSAg2A5XUZVC/view',
            'course_id' => Course::factory()
        ];
    }
}
