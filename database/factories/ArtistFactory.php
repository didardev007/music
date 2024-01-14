<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    public function definition(): array
    {
        $files = Storage::disk('public')->allFiles('artist');
        $randomFile = $files[rand(0, count($files) - 1)];

        $name = fake()->name();
        $date_of_birth = fake()->date('Y-m-d', '-8 years');
        $country = fake()->country();
        $image = $randomFile;

        return [
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug(),
            'date_of_birth' => $date_of_birth,
            'country' => $country,
            'image' => $image,
        ];
    }
}
