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

        return [
            'artist_id' => $artist->id,
            'name' => $name,
            'slug' => str($name)->slug(),
            'description' => fake()->text(255),
        ];
    }
}
