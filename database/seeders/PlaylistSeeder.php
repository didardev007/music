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
        $playlists = [
            ['name' => 'Favorites', 'name_ru' => 'Избранное'],
            ['name' => 'New', 'name_ru' => 'Новинки'],
            ['name' => "Top-100 of the Month", 'name_ru' => 'Топ-100 месяца'],
        ];

        for ($i = 0; $i < count($playlists); $i++) {
            $playlist = $playlists[$i];

            Playlist::create([
                'name' => $playlist['name'],
                'name_ru' => $playlist['name_ru'],
                'slug' => str($playlist['name'])->slug(),
                'image' => 'playlist/topPlaylist.jpg',
            ]);
        }
    }
}
