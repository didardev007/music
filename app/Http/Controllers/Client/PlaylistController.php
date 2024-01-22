<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Track;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
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
                $query->orWhere('slug', 'like', '%' . $f_q . '%');
                $query->orWhere('name', 'like', '%' . $f_q2 . '%');
                $query->orWhere('slug', 'like', '%' . $f_q2 . '%');
                if ('name_ru' == null) {
                    $query->orWhere('name_ru', 'like', '%' . $f_q . '%');
                };
            });
        })
            ->with('tracks')
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
        $obj = Playlist::with(['tracks' => function ($query) {
            $query->with('artist', 'album', 'genre', 'playlists');
            $query->orderBy('release_date', 'desc');
        }])
            ->findOrFail($playlist);

        $top_100 = Playlist::with(['tracks' => function ($query) {
            $query->with('artist', 'album', 'genre', 'playlists');
            $query->orderBy('viewed', 'desc');
        }])
            ->findOrFail($playlist);

        $user = auth()->user();
        $favorites = $user->tracks();

        return view('client.playlists.show')
            ->with([
                'obj' => $obj,
                'top_100' => $top_100,
                'favorites' => $favorites,
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
