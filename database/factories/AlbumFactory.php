<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{

    public function definition(): array
    {
        $artist = Artist::inRandomOrder()->first();
        $name = fake()->name();
        $release_date = fake()->date('Y-m-d');
        $created_at = fake()->dateTimeBetween($release_date, 'now')->format('Y-m-d');

        return [
            'artist_id' => $artist->id,
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug(),
            'description' => fake()->text(255),
            'release_date' => $release_date,
            'created_at' => $created_at,
        ];
    }
}
