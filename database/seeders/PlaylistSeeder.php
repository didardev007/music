<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    public function run(): void
    {
        $playlists = [
            ['name' => 'Favorites', 'name_ru' => 'Избранное'],
            ['name' => 'New', 'name_ru' => 'Новинки'],
            ['name' => "Top-100 of the Month", 'name_ru' => 'Топ-100 месяца'],
        ];

        foreach ($playlists as $playlist) {
            Playlist::create([
                'name' => $playlist['name'],
                'name_ru' => $playlist['name_ru'],
                'slug' => str($playlist['name'])->slug(),
                'image' => 'topPlaylist.jpg',
            ]);
        }
    }
}
