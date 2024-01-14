<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterMaking(function (Playlist $playlist) {
            // ...
        })->afterCreating(function (Playlist $playlist) {
            $playlist->slug = str($playlist->name)->slug() . '-' . $playlist->id;
            $playlist->update();
        });
    }

    public function definition(): array
    {
        $files = Storage::disk('public')->allFiles('playlist');
        $randomFile = $files[rand(0, count($files) - 1)];

        $name = fake()->colorName();

        return [
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug() . rand(),
            'image' => $randomFile,
        ];
    }
}
