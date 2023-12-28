<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'album' => 'nullable|string|max:255',
            'track' => 'nullable|string|max:30',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_album = $request->has('album') ? $request->album : null;
        $f_track = $request->has('track') ? $request->track : null;

        return $artists = Artist::when()
            ->when(isset($f_q), function ($query) use ($f_q) {
                return $query->whereHas(function ($query) use ($f_q) {
                    $query->orWhere('name', 'like', '%' . $f_q . '%');
                });
            })
            ->when(isset($f_album), function ($query) use ($f_album) {
                return $query->whereHas(function ($query) use ($f_album) {
                    $query->where($f_album);
                });
            })
            ->when(isset($f_track), function ($query) use ($f_track) {
                return $query->whereHas(function ($query) use ($f_track) {
                    $query->where($f_track);
                });
            })
            ->with('albums', 'tracks')
            ->paginate(20)
            ->withQueryString();

        $albums = Album::orderBy('name')
            ->get();

        $tracks = Track::orderBy('name')
            ->get();

        return view('client.artists.index')
            ->with([
                'artists' => $artists,
                'albums' => $albums,
                'tracks' => $tracks,
                'f_q' => $f_q,
                'f_album' => $f_album,
                'f_track' => $f_track,
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
    public function show($artist)
    {
        $obj = Artist::with('tracks', 'albums')
            ->findOrFail($artist);

        return view('client.tracks.show')
            ->with([
                'obj' => $obj,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
