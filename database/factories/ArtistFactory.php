<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->name();
        $date_of_birth = fake()->date('Y-m-d', '-8 years');
        $country = fake()->country();
        $image = "/artist.jpg";

        return [
            'name' => $name,
            'date_of_birth' => $date_of_birth,
            'country' => $country,
            'image' => $image,
        ];
    }
}
