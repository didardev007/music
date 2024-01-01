<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class TrackFactory extends Factory
{

    public function configure(): static
    {
        return $this->afterMaking(function (Track $track) {
            // ...
        })->afterCreating(function (Track $track) {
            $track->slug = str($track->name)->slug() . '-' . $track->id;
            $track->update();
        });
    }


    public function definition(): array
    {
        $artist = Artist::inRandomOrder()->first();
        $album = Album::inRandomOrder()->first();
        $genre = Genre::inRandomOrder()->first();
        $name = fake()->company();
        $durability = fake()->randomFloat(2, 0, 30);
        $release_date = fake()->date('Y-m-d');
        $created_at = fake()->dateTimeBetween($release_date, 'now')->format('Y-m-d');

        return [
            'artist_id' => $artist->id,
            'album_id' => $album->id,
            'genre_id' => $genre->id,
            'name' => $name,
            'slug' => str($name)->slug(),
            'durability' => $durability,
            'release_date' => $release_date,
            'created_at' => $created_at,
        ];
    }
}
