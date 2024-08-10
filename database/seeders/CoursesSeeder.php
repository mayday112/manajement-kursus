<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'judul' => 'Pemrograman WEB',
                'slug' => Str::slug(fake()->sentence()),
                'deskripsi' => fake()->text(),
                'durasi' => 3
            ],
            [
                'judul' => 'Pemrograman Android',
                'slug' => Str::slug(fake()->sentence()),
                'deskripsi' => fake()->text(),
                'durasi' => 3
            ],
            [
                'judul' => 'UI UX',
                'slug' => Str::slug(fake()->sentence()),
                'deskripsi' => fake()->text(),
                'durasi' => 3
            ],
            [
                'judul' => 'IOT',
                'slug' => Str::slug(fake()->sentence()),
                'deskripsi' => fake()->text(),
                'durasi' => 3
            ],
            [
                'judul' => 'Data Analis',
                'slug' => Str::slug(fake()->sentence()),
                'deskripsi' => fake()->text(),
                'durasi' => 3
            ],
        ];


        foreach($courses as $course){
            Course::create($course);
        }
    }
}
