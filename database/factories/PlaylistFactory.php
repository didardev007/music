<?php

namespace Database\Factories;

use App\Models\Playlist;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $name = fake()->colorName();

        return [
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug() . rand(),
            'image' => 'playlist.jpg',
        ];
    }
}
