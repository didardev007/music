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
        \App\Models\Artist::factory(50)->create();
        \App\Models\Album::factory(75)->create();
        \App\Models\Track::factory(150)->create();
        $this->call([
            PlaylistSeeder::class,
        ]);
        \App\Models\Playlist::factory(50)->create();
        \App\Models\User::factory(50)->create();
    }
}
