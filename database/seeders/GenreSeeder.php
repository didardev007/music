<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Speed Up',
            'Slowed + Reverb',
            'Indie Music',
            'Jazz',
            'Opera',
            'Remix',
            'Acoustic',
            'Rock',
            'Rep & Hip Hop',
            'Pop',
        ];

        foreach ($genres as $genre) {
            $el = new Genre();
            $el->name = $genre;
            $el->save();
        }
    }
}
