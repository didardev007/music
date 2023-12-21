<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $artist = Artist::inRandomOrder()->first();
        return [
            'artist_id' => $artist->id,
            'name' => fake()->name(),
            'description' => fake()->text(255),
        ];
    }
}
