<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Artist::factory(10)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Track::factory(10)->create();
    }
}
