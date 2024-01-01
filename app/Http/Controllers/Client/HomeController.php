<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $genres = Genre::inRandomOrder()
            ->take(10)
            ->get();

        $artists = Artist::inRandomOrder()
            ->take(10)
            ->get();

        $albums = Album::inRandomOrder()
            ->take(10)
            ->get();

        $tracks = Track::with('artist', 'album', 'genre')
            ->inRandomOrder()
            ->take(20)
            ->get();

        $newTracks = Track::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('client.home.index')
            ->with([
                'genres' => $genres,
                'artists' => $artists,
                'albums' => $albums,
                'tracks' => $tracks,
                'newTracks' => $newTracks,
            ]);
    }

    public function locale($locale)
    {
        if ($locale == 'ru') {
            session()->put('locale', 'ru');
            return redirect()->back();
        } else {
            session()->put('locale', 'en');
            return redirect()->back();
        }
    }
}