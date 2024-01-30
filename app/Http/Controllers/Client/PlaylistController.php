<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\Track;
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

        $user = auth()->user();

        return view('client.playlists.index')
            ->with([
                'playlists' => $playlists,
                'topPlaylists' => $topPlaylists,
                'f_q' => $f_q,
                'user' => $user,
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
        $new = Track::orderBy('release_date', 'desc')
            ->with('artist', 'album', 'genre')
            ->take(100)
            ->get();

        $top_100 = Track::with('artist', 'album', 'genre')
            ->orderBy('viewed', 'desc')
            ->take(100)
            ->get();

        $obj = Playlist::with(['tracks' => function ($query) {
            $query->with('artist', 'album', 'genre');
            $query->orderBy('id', 'desc');
        }])
            ->findOrFail($playlist);

        return view('client.playlists.show')
            ->with([
                'obj' => $obj,
                'top_100' => $top_100,
                'new' => $new,
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
