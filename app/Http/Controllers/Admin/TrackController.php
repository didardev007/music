<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')
            ->with('artist', 'album', 'genre')
            ->get();

        return view('admin.track.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::orderBy('id', 'desc')
        ->get();

        $albums = Album::orderBy('id', 'desc')
        ->get();

        $genres = Genre::orderBy('id', 'desc')
        ->get();

        return view('admin.track.create', compact('artists', 'albums', 'genres'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
            'album_id' => 'nullable|exists:albums,id',
            'genre_id' => 'required|exists:genres,id',
            'durability' => 'required|numeric',
            'viewed' => 'required|integer',
            'release_date' => 'required|date',
        ]);

        // Generate slug from the track name
        $slug = Str::slug($validatedData['name']);

        // Check if the generated slug already exists, and append a unique identifier if needed
        $count = Track::where('slug', $slug)->count();
        $validatedData['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        Track::create($validatedData);

        return redirect()->route('admin.track.index')->with('success', 'Track created successfully.');
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
    public function edit($id)
    {
        // Find the track by ID
        $track = Track::findOrFail($id);

        // Fetch artists, albums, and genres for dropdowns
        $artists = Artist::get();
        $albums = Album::get();
        $genres = Genre::get();

        // Load the edit form view with track and related data
        return view('admin.track.edit', compact('track', 'artists', 'albums', 'genres'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
            'album_id' => 'nullable|exists:albums,id',
            'genre_id' => 'required|exists:genres,id',
            'durability' => 'required|string',
            'viewed' => 'required|string',
            'release_date' => 'required|date',
        ]);

        // Find the track by ID
        $track = Track::findOrFail($id);

        // Update the track with the form data
        $track->update([
            'name' => $request->input('name'),
            'artist_id' => $request->input('artist_id'),
            'album_id' => $request->input('album_id'),
            'genre_id' => $request->input('genre_id'),
            'durability' => $request->input('durability'),
            'viewed' => $request->input('viewed'),
            'release_date' => $request->input('release_date'),
        ]);

        // Redirect back with a success message or to another route
        return redirect()->route('admin.track.index')->with('success', 'Track updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the track by ID
        $track = Track::findOrFail($id);

        // Delete the track
        $track->delete();

        // Redirect back with a success message or to another route
        return redirect()->route('admin.track.index')->with('success', 'Track deleted successfully');
    }
}
