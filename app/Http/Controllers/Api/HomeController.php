<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newTracks = Track::with('artist', 'album', 'genre')
            ->orderBy('release_date', 'desc')
            ->take(10)
            ->get(['id', 'name', 'slug', 'viewed', 'release_date', 'mp3_path', 'file_size', 'image', 'created_at', 'artist_id', 'album_id', 'genre_id']);

        $popularTracks = Track::with('artist', 'album', 'genre')
            ->where('viewed', '>', 10)
            ->take(10)
            ->get(['id', 'name', 'slug', 'viewed', 'release_date', 'mp3_path', 'file_size', 'image', 'created_at', 'artist_id', 'album_id', 'genre_id'])
            ->transform(function ($obj) {
                return [
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'slug' => $obj->slug,
                    'viewed' => $obj->viewed,
                    'release_date' => $obj->release_date,
                    'mp3_path' => url('/') . Storage::url($obj->mp3_path),
                    'file_size' => $obj->file_size,
                    'image' => url('/') . Storage::url($obj->image),
                    'created_at' => $obj->created_at,
                ];
            });
        if (!$popularTracks) {
            return response()->json([
                'status' => 0,
                'message' => 'Product not found',
            ], Response::HTTP_NOT_FOUND);
        }
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
