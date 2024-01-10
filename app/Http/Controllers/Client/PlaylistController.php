<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function markFavorite($trackId)
    {
        $track = Track::findOrFail($trackId);

        // Toggle the favorite status
        $track->is_favorite = !$track->is_favorite;
        $track->save();

        $message = $track->is_favorite ? 'Track marked as favorite' : 'Track canceled in favorites';

        return redirect()->back()->with('success', $message);
    }


    public function showFavorites()
    {
        $favoriteTracks = Track::where('is_favorite', true)
            ->with('artist', 'album', 'genre')
            ->get();

        return view('client.playlists.index', ['favoriteTracks' => $favoriteTracks]);
    }

    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;

        $playlists = Playlist::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
            return $query->where(function ($query) use ($f_q, $f_q2) {
                $query->orWhere('name', 'like', '%' . $f_q . '%');
                $query->orWhere('name_ru', 'like', '%' . $f_q . '%');
                $query->orWhere('slug', 'like', '%' . $f_q . '%');
                $query->orWhere('name', 'like', '%' . $f_q2 . '%');
                $query->orWhere('slug', 'like', '%' . $f_q2 . '%');
            });
        })
            ->paginate(20)
            ->withQueryString();

        $topPlaylists = Playlist::where('name', 'Favorites')
            ->orWhere('name', 'New')
            ->orWhere('name', 'Top-100 of the Month')
            ->get();

        return view('client.playlists.index')
            ->with([
                'playlists' => $playlists,
                'topPlaylists' => $topPlaylists,
                'f_q' => $f_q,
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
    public function show($playlist)
    {
        $obj = Playlist::with('tracks')
            ->findOrFail($playlist);

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
