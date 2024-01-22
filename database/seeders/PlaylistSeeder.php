<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PlaylistSeeder extends Seeder
{
    public function run(): void
    {
        $new = Track::orderBy('release_date', 'desc')->take(25)->get();
        $top = Track::orderBy('viewed', 'desc')->take(25)->get();

        $playlists = [
            ['name' => 'Favorites', 'name_ru' => 'Избранное', 'values' => []],
            ['name' => 'New', 'name_ru' => 'Новинки', 'values' => $new],
            ['name' => "Top-100 of the Month", 'name_ru' => 'Топ-100 месяца', 'values' => $top],
        ];

        for ($i = 0; $i < count($playlists); $i++) {
            $playlist = $playlists[$i];

            $obj = Playlist::create([
                'name' => $playlist['name'],
                'name_ru' => $playlist['name_ru'],
                'slug' => str($playlist['name'])->slug(),
                'image' => 'playlist/topPlaylist.jpg',
            ]);

            $track_playlists = [];

            for ($j = 0; $j < count($playlist['values']); $j++) {
                $value = $playlist['values'][$j];

                $track_playlists[] = $value->id;
            }

            $obj->tracks()->sync($track_playlists);
        }
    }
}
