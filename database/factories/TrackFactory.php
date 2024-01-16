<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $files = Storage::disk('public')->allFiles('track');
        $randomFile = $files[rand(0, count($files) - 1)];

        $images = Storage::disk('public')->allFiles('track_img');
        $randomImages = $images[rand(0, count($images) - 1)];

        $artist = Artist::inRandomOrder()->first();
        $album = Album::where('artist_id', $artist->id)->inRandomOrder()->first();
        $genre = Genre::inRandomOrder()->first();
        $name = fake()->company();
        $durability = fake()->randomFloat(2, 0, 30);
        $viewed = rand();
        $release_date = fake()->date('Y-m-d');
        $created_at = fake()->dateTimeBetween($release_date, 'now')->format('Y-m-d');
        $mp3_path = $randomFile;
        $file_size = Storage::disk('public')->size($mp3_path);

        return [
            'artist_id' => $artist->id,
            'album_id' => isset($album) ? $album->id : null,
            'genre_id' => $genre->id,
            'name' => $name,
            'slug' => str($name)->slug() . rand(),
            'durability' => $durability,
            'viewed' => $viewed,
            'release_date' => $release_date,
            'mp3_path' => $mp3_path,
            'file_size' => $file_size,
            'image' => $randomImages,
            'created_at' => $created_at,
        ];
    }

}
