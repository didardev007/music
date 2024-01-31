<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            GenreSeeder::class,
        ]);
        \App\Models\Artist::factory(5)->create();
        \App\Models\Album::factory(5)->create();
        \App\Models\Track::factory(10)->create();
        $this->call([
            PlaylistSeeder::class,
        ]);
        \App\Models\Playlist::factory(5)->create();
        \App\Models\User::factory(5)->create();
    }
}
