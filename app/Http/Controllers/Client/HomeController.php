<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('tracks')
            ->orderBy('Tracks_count', 'desc')
            ->take(10)
            ->get();

        $genreTracks = [];

        foreach ($genres as $genre) {
            $genreTracks[] = [
                'genre' => $genre,
                'Tracks' => Track::where('genre_id', $genre->id)
                ->with('genre')
                ->take(10)
                ->get(),
            ];
        }

        return view('client.home.index')
            ->with([
                'genreTracks' => $genreTracks,
            ]);
    }
}