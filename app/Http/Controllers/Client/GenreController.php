<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;

        $genres = Genre::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
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
            ->paginate(20)
            ->withQueryString();

        return view('client.genres.index')
            ->with([
                'genres' => $genres,
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
    public function show($genre)
    {
        $obj = Genre::with('tracks')
            ->findOrFail($genre);

        $tracks = Track::where('genre_id', $obj->id)
            ->with('artist', 'genre', 'album', 'playlists')
            ->orderBy('release_date', 'desc')
            ->get();

        return view('client.genres.show')
            ->with([
                'obj' => $obj,
                'tracks' => $tracks,
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
