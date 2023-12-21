<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistTracksSeeder extends Seeder
{
    public function run(): void
    {
        $playlists = [
            ['name' => 'Tirkesh', 'tracks' => [Track::inRandomOrder()->take(50)]],
            ['name' => 'Didar', 'tracks' => [Track::inRandomOrder()->take(50)]],
            ['name' => 'Selim', 'tracks' => [Track::inRandomOrder()->take(50)]],
        ];

        for ($i = 0; $i < count($playlists); $i++) {
            $playlist = $playlists[$i];

            $obj = Playlist::create([
                'name' => $playlist['name'],
            ]);

            for ($j = 0; $j < count($playlist['tracks']); $j++) {
                $track = $playlist['tracks'][$j];


            }
        }
    }
}
