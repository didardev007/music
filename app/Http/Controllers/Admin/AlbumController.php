<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:255',
        ]);


        $q = $request->q ?: null;

        $albums = Album::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name', 'like', '%' . $q . '%');
            });
        })
            ->orderBy('id' , 'desc')
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
            'name_ru' => 'nullable|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Album::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $album = Album::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imageFile->storeAs('public/album', $imageFileName);

            // Save the image path in the database
            $album->update(['image' => 'album/' . $imageFileName]);
        }

        return redirect()->route('admin.album.index')->with('success', 'Album created successfully');
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
            'name_ru' => 'nullable|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',// Validate the single artist ID
        ]);

        $slug = Str::slug($request['name']);
        $count = Album::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $album->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imageFile->storeAs('public/album', $imageFileName);

            // Save the image path in the database
            $album->update(['image' => 'artist/' . $imageFileName]);
        }

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
