<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::withCount('track')
            ->orderBy('Tracks_count' ,'desc')
            ->take(7)
            ->get();

        $genreTracks = [];
        foreach ($genres as $genre) {
            $genreTracks[] = [
                'genre' => $genre,
                'Tracks' => Track::where('genre_id', $genre->id)
                ->with('genre')
                ->take(8)
                ->get(),
            ];
        }

        return view('home.index')
            ->with([
                'genreTracks' => $genreTracks,
            ]);
    }
}