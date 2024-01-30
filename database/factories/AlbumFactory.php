<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{

    public function definition(): array
    {
        $files = Storage::disk('public')->allFiles('album');
        $randomFile = $files[rand(0, count($files) - 1)];

        $artist = Artist::inRandomOrder()->first();
        $name = fake()->name();
        $description = fake()->text(255);
        $release_date = fake()->date('Y-m-d');
        $created_at = fake()->dateTimeBetween($release_date, 'now')->format('Y-m-d');

        return [
            'artist_id' => $artist->id,
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug(),
            'description' => $description,
            'description_ru' => str($description)->upper(),
            'image' => $randomFile,
            'release_date' => $release_date,
            'created_at' => $created_at,
        ];
    }
}
