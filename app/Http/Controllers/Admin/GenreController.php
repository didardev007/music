<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::orderBy('id', 'desc')
            ->get();

        return view('admin.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.create');
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
        $count = Genre::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $genre = Genre::create($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/genre', $imageFileName);

            // Save the image path in the database
            $genre->update(['image' => 'genre/' . $imageFileName]);
        }

        return redirect()->route('admin.genre.index')->with('success', 'Genre created successfully');
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
        $genre = Genre::findOrFail($id);

        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug = Str::slug($request['name']);
        $count = Genre::where('slug', $slug)->count();
        $request['slug'] = ($count > 0) ? $slug . '-' . time() : $slug;

        $genre->update($request->all());

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageFile = $request->file('image');
            $imageFileName = $imageFile->getClientOriginalName(); // You might want to use a unique filename

            // Store the image in the "public/img" directory
            $imagePath = $imageFile->storeAs('public/genre', $imageFileName);

            // Save the image path in the database
            $genre->update(['image' => 'genre/' . $imageFileName]);
        }

        return redirect()->route('admin.genre.index')->with('success', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);

        $genre->delete();

        return redirect()->route('admin.genre.index')->with('success', 'Genre deleted successfully');
    }
}
