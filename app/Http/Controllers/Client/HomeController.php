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
    public function index(Request $request)
    {
        $genres = Genre::inRandomOrder()
            ->take(9)
            ->get();

        $artists = Artist::inRandomOrder()
            ->take(9)
            ->get();

        $albums = Album::orderBy('release_date', 'desc')
            ->take(9)
            ->get();


        $newTracks = Track::with('artist', 'album', 'genre')
            ->orderBy('release_date', 'desc')
            ->orderBy('viewed', 'desc')
            ->take(9)
            ->get();

        $popularTracks = Track::with('artist', 'album', 'genre')
            ->orderBy('viewed', 'desc')
            ->take(9)
            ->get();

        return view('client.home.index')
            ->with([
                'genres' => $genres,
                'artists' => $artists,
                'albums' => $albums,
                'newTracks' => $newTracks,
                'popularTracks' => $popularTracks,
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