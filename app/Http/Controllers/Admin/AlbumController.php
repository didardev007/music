<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::orderBy('id' , 'desc')
            ->with('artist')
            ->get();
        return view('admin.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create()
    {
        $artists = Artist::orderBy('id', 'desc')->get();
        return view('admin.album.create', compact('artists'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|exists:artists,id',
        ]);

        $album = Album::create([
            'name' => $request->input('name'),
            'artist_id' => $request->input('artist'),
        ]);

        return redirect()->route('admin.album.index', compact('album'))->with('success', 'Album created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $album = Album::with('artist')
            ->findOrFail($id);

        $artists = Artist::orderBy('id', 'desc')
            ->get();

        return view('admin.album.edit', compact('album', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album = Album::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'artist' => 'required|exists:artists,id', // Validate the single artist ID
        ]);

        $album->update([
            'name' => $request->input('name'),
            'artist_id' => $request->input('artist'),
        ]);

        return redirect()->route('admin.album.index')->with('success', 'Album updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);

        $album->delete();

        return redirect()->route('admin.album.index')->with('success', 'Album deleted successfully');
    }
}
