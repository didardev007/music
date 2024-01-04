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
        \App\Models\User::factory(10)->create();
        \App\Models\Artist::factory(30)->create();
        \App\Models\Album::factory(50)->create();
        \App\Models\Track::factory(250)->create();
    }
}
