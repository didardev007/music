<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'artist' => 'nullable|string|max:255',
            'newAlbum' => 'nullable|boolean',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_q2 = $request->has('q') ? str($request->q)->slug() : null;
        $f_artist = $request->has('artist') ? $request->artist : null;
        $f_newAlbum = $request->has('newAlbum') ? $request->newAlbum : null;

        $albums = Album::when(isset($f_q), function ($query) use ($f_q, $f_q2) {
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
                return $query->whereHas(function ($query) use ($f_artist) {
                    $query->orWhere($f_artist);
                });
            })
            ->when($f_newAlbum, function ($query) {
                return $query->where('create_at', '>=', Carbon::now()->subMonth());
            })
            ->with('artist')
            ->paginate(20)
            ->withQueryString();

        $artists = Artist::orderBy('name')
            ->get();

        return view('client.albums.index')
            ->with([
                'albums' => $albums,
                'artists' => $artists,
                'f_q' => $f_q,
                'f_artist' => $f_artist,
                'f_newAlbum' => $f_newAlbum,
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
    public function show($album)
    {
        $obj = Album::with('tracks', 'artist')
            ->findOrFail($album);

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
