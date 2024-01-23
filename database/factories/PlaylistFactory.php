<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;


class PlaylistFactory extends Factory
{
    public function configure(): static
    {
        return $this->afterMaking(function (Playlist $playlist) {
            // ...
        })->afterCreating(function (Playlist $playlist) {
            $playlist->slug = str($playlist->name)->slug() . '-' . $playlist->id;
            $playlist->update();

            $track_playlists = [];
            $tracks = Track::get();
            foreach ($tracks as $track) {
                $track = Track::inRandomOrder()
                    ->first();

                $track_playlists[] = $track->id;
            }

            $playlist->tracks()->sync($track_playlists);
        });
    }

    public function definition(): array
    {
        $files = Storage::disk('public')->allFiles('playlist');

        foreach ($files as $file) {
            if ($file = array_search('playlist/topPlaylist.jpg', $files)) {
                unset($files[$file]);
            }
        }

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
