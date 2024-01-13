<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|string|max:255',
            'artist' => 'nullable|string|max:255',
            'album' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'newTrack' => 'nullable|boolean',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;
        $f_artist = $request->has('artist') ? $request->atrtist : null;
        $f_album = $request->has('album') ? $request->album : null;
        $f_genre = $request->has('genre') ? $request->genre : null;
        $f_newTrack = $request->has('newTrack') ? $request->newTrack : null;
        $f_popularTrack = $request->has('popularTrack') ? $request->popularTrack : null;

        $tracks = Track::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
                return $query->where(function ($query) use ($f_q, $f_q2) {
                    $query->orWhere('name', 'like', '%' . $f_q . '%');
                    $query->orWhere('slug', 'like', '%' . $f_q . '%');
                    $query->orWhere('name', 'like', '%' . $f_q2 . '%');
                    $query->orWhere('slug', 'like', '%' . $f_q2 . '%');
                    if ('name_ru' == null) {
                        $query->orWhere('name_ru', 'like', '%' . $f_q . '%');
                    };
                });
            })
            ->when(isset($f_artist), function ($query) use ($f_artist) {
                return $query->whereHas('artist', function ($query) use ($f_artist) {
                    $query->where('slug', $f_artist);
                });
            })
            ->when(isset($f_album), function ($query) use ($f_album) {
                return $query->whereHas('album', function ($query) use ($f_album) {
                    $query->where('slug', $f_album);
                });
            })
            ->when(isset($f_genre), function ($query) use ($f_genre) {
                return $query->whereHas('genre', function ($query) use ($f_genre) {
                   $query->where('slug', $f_genre);
                });
            })
            ->when($f_newTrack, function ($query) {
                return $query->where('release_date', '>=', Carbon::now()->subWeek());
            })
            ->when($f_popularTrack, function ($query) {
                return $query->orderBy('viewed', 'desc');
            })
            ->with('artist', 'album', 'genre')
            ->paginate(20)
            ->withQueryString();

        $artists = Artist::orderBy('name')
            ->get();

        $albums = Album::orderBy('name')
            ->get();

        $genres = Genre::orderBy('name')
            ->get();

        return view('client.tracks.index')
            ->with([
                'tracks' => $tracks,
                'artists' => $artists,
                'albums' => $albums,
                'genres' => $genres,
                'f_q' => $f_q,
                'f_popularTrack' => $f_popularTrack,
                'f_artist' => $f_artist,
                'f_album' => $f_album,
                'f_genre' => $f_genre,
                'f_newTrack' => $f_newTrack,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::orderBy('name')
            ->get();

        $artists = Artist::orderBy('name')
            ->get();

        $albums = Album::orderBy('name')
            ->get();

        $genres = Genre::orderBy('name')
            ->get();

        return view('client.tracks.create')
            ->with([
                'users' => $users,
                'artists' => $artists,
                'albums' => $albums,
                'genres' => $genres,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($track)
    {
        $obj = Track::with('artist', 'album', 'genre')
            ->findOrFail($track);

        return view('client.tracks.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
