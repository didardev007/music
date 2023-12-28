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
        $f_user = $request->has('user') ? $request->user : null;
        $f_artist = $request->has('artist') ? $request->atrtist : null;
        $f_album = $request->has('album') ? $request->album : null;
        $f_genre = $request->has('genre') ? $request->genre : null;
        $f_newTrack = $request->has('newTrack') ? $request->newTrack : null;

        $track = Track::when(isset($f_q), function ($query) use ($f_q) {
                return $query->where(function ($query) use ($f_q) {
                    $query->orWhere('name', 'like', '%' . $f_q . '%');
                });
            })
            ->when(isset($f_user), function ($query) use ($f_user) {
                return $query->whereHas('user', function ($query) use ($f_user) {
                    $query->where('username', $f_user);
                });
            })
            ->when(isset($f_artist), function ($query) use ($f_artist) {
                return $query->whereHas('artist', function ($query) use ($f_artist) {
                    $query->where($f_artist);
                });
            })
            ->when(isset($f_album), function ($query) use ($f_album) {
                return $query->whereHas('album', function ($query) use ($f_album) {
                    $query->where($f_album);
                });
            })
            ->when(isset($f_genre), function ($query) use ($f_genre) {
                return $query->whereHas('genre', function ($query) use ($f_genre) {
                   $query->where($f_genre);
                });
            })
            ->when($f_newTrack, function ($query) {
                return $query->where('create_at', '>=', Carbon::now()->subMonth());
            })
            ->with('artist', 'album', 'genre')
            ->paginate(20)
            ->withQueryString();

        $users = User::orderBy('name')
            ->get();

        $artist = Artist::orderBy('name')
            ->get();

        $album = Album::orderBy('name')
            ->get();

        $genre = Genre::orderBy('name')
            ->get();

        return view('client.tracks.index')
            ->with([
                'track' => $track,
                'users' => $users,
                'artist' => $artist,
                'album' => $album,
                'genre' => $genre,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_artist' => $f_artist,
                'f_album' => $f_album,
                'f_genre' => $f_genre,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        $obj = Track::with('artist', 'album', 'genre')
            ->findOrFail($track);

        return view('client.tracks.show')
            ->with([
                'obj' => $obj,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        //
    }
}
