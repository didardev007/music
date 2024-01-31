<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::with('artist', 'album', 'genre')
            ->get(['id', 'name', 'slug', 'viewed', 'release_date', 'mp3_path', 'file_size', 'image', 'created_at', 'artist_id', 'album_id', 'genre_id']);

        return response()->json([
            'tracks' => $tracks,
        ]);
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
    public function show(string $id)
    {
        $obj = Track::where('id', $id)
            ->with('artist', 'album', 'genre')
            ->first();
        if (!$obj) {
            return response()->json([
                'status' => 0,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }

        $track = [
            'id' => $obj->id,
            'name' => $obj->name,
            'slug' => $obj->slug,
            'viewed' => $obj->viewed,
            'release_date' => $obj->release_date,
            'mp3_path' => $obj->mp3_path,
            'file_size' => $obj->file_size,
            'image' => $obj->image,
            'created_at' => $obj->created_at,
            'artist' => $obj->artist,
            'album' => $obj->album,
            'genre' => $obj->genre,
        ];

        return response()->json([
            'track' => $track,
        ]);
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
