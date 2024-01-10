<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->colorName();

        return [
            'name' => $name,
            'name_ru' => str($name)->upper(),
            'slug' => str($name)->slug(),
        ];
    }
}
