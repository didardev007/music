<?php

namespace App\Http\Controllers\Admin;

use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::orderBy('id', 'desc')
            ->get();

        return view('admin.playlist.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Playlist::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $playlist = Playlist::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/playlist', $imageFileName);

            // Save the image path in the database
            $playlist->update(['image' => 'playlist/' . $imageFileName]);
        }

        return redirect()->route('admin.playlist.index')->with('success', 'Playlist created successfully.');
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
        $playlist = Playlist::findOrFail($id);
        return view('admin.playlist.edit', compact('playlist'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Playlist::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;



        $playlist = Playlist::findOrFail($id);

        $playlist->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/playlist', $imageFileName);

            // Save the image path in the database
            $playlist->update(['image' => 'playlist/' . $imageFileName]);
        }

        return redirect()->route('admin.playlist.index')->with('success', 'Playlist updated successfully.');
    }

    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();

        return redirect()->route('admin.playlist.index')->with('success', 'Playlist deleted successfully.');
    }
}
