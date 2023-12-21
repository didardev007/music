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
        \App\Models\User::factory(100)->create();
        \App\Models\Artist::factory(100)->create();
        \App\Models\Album::factory(100)->create();
        \App\Models\Track::factory(100)->create();
    }
}
