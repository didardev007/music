<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    public function definition(): array
    {
        $artist = Artist::inRandomOrder()->first();
        $album = Album::inRandomOrder()->first();
        $genre = Genre::inRandomOrder()->first();
        $name = fake()->company();
        $durability = fake()->randomFloat(2, 0, 30);
        $release_date = fake()->date('Y-m-d');

        return [
            'artist_id' => $artist->id,
            'album_id' => $album->id,
            'genre_id' => $genre->id,
            'name' => $name,
            'durability' => $durability,
            'release_date' => $release_date,
            'favorite' => fake()->boolean(),
        ];
    }
}
