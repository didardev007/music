<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ArtistController extends Controller
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

        $artists = Artist::when($q, function ($query, $q) {
            return $query->where(function ($query) use ($q) {
                $query->orWhere('name', 'like', '%' . $q . '%');
            });
        })  ->orderBy('id', 'desc')
            ->get();

        return view('admin.artist.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Artist::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $artist = Artist::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imageFile->storeAs('public/artist', $imageFileName);

            // Save the image path in the database
            $artist->update(['image' => 'artist/' . $imageFileName]);
        }

        return redirect()->route('admin.artist.index')->with('success', 'Artist created successfully');
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
        $artist = Artist::findOrFail($id);

        return view('admin.artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artist = Artist::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'name_ru' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Artist::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $artist->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imageFile->storeAs('public/artist', $imageFileName);

            // Save the image path in the database
            $artist->update(['image' => 'artist/' . $imageFileName]);
        }

        return redirect()->route('admin.artist.index')->with('success', 'Artist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::findOrFail($id);

        $artist->delete();

        return redirect()->route('admin.artist.index')->with('success', 'Artist deleted successfully');
    }
}
