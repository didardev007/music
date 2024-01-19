<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
            'release_date' => 'required|date',
            'mp3_path' => 'required|file|mimes:mp3|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Generate slug from the track name
        $slug = Str::slug($validatedData['name']);

        // Check if the generated slug already exists, and append a unique identifier if needed
        $count = Track::where('slug', $slug)->count();
        $validatedData['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        // Create the track
        $track = Track::create($validatedData);

        // Store MP3 file
        if ($request->hasFile('mp3_path') && $request->file('mp3_path')->isValid()) {
            $mp3File = $request->file('mp3_path');
            $mp3FileName = $mp3File->getClientOriginalName(); // You might want to use a unique filename

            // Store the file in the "public/track" directory
            $mp3Path = $mp3File->storeAs('public/track', $mp3FileName);

            // Save the file path in the database
            $track->update(['mp3_path' => 'track/' . $mp3FileName]);
        }

        // Handle image upload if provided
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/track_img', $imageFileName);

            // Save the image path in the database
            $track->update(['image' => 'track_img/' . $imageFileName]);
        }

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
        $track = Track::findOrFail($id);
        $artists = Artist::orderBy('id', 'desc')->get();
        $albums = Album::orderBy('id', 'desc')->get();
        $genres = Genre::orderBy('id', 'desc')->get();

        return view('admin.track.edit', compact('track', 'artists', 'albums', 'genres'));
    }

    // ... other methods ...

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'artist_id' => 'required|exists:artists,id',
            'album_id' => 'nullable|exists:albums,id',
            'genre_id' => 'required|exists:genres,id',
            'durability' => 'required|numeric',
            'release_date' => 'required|date',
            'mp3_path' => 'nullable|file|mimes:mp3|max:10240',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $track = Track::findOrFail($id);

        // Update the track details
        $track->update([
            'name' => $validatedData['name'],
            'artist_id' => $validatedData['artist_id'],
            'album_id' => $validatedData['album_id'],
            'genre_id' => $validatedData['genre_id'],
            'durability' => $validatedData['durability'],
            'release_date' => $validatedData['release_date'],
        ]);

        // Update MP3 file if provided
        if ($request->hasFile('mp3_path') && $request->file('mp3_path')->isValid()) {
            $mp3File = $request->file('mp3_path');
            $mp3FileName = $mp3File->getClientOriginalName(); // You might want to use a unique filename

            // Store the file in the "public/track" directory
            $mp3Path = $mp3File->storeAs('public/track', $mp3FileName);

            // Save the file path in the database
            $track->update(['mp3_path' => 'track/' . $mp3FileName]);
        }

        // Update image if provided
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/track_img', $imageFileName);

            // Save the image path in the database
            $track->update(['image' => 'track_img/' . $imageFileName]);
        }

        return redirect()->route('admin.track.index')->with('success', 'Track updated successfully.');
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
