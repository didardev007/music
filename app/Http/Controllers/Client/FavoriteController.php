<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorites($trackId)
    {
        $user = auth()->user();
        $user->tracks()->syncWithoutDetaching([$trackId]);

        return response()->json(['success' => true]);
    }

    public function removeFromFavorites($trackId)
    {
        $user = auth()->user();
        $user->tracks()->detach($trackId);

        return response()->json(['success' => true]);
    }


    public function showFavorites($playlistId, $userId) {
        $favorites = User::with(['tracks' => function ($query) {
            $query->with('artist', 'album', 'genre');
            $query->orderBy('id', 'desc');
        }])
            ->findOrFail($userId);

        $obj = Playlist::findOrFail($playlistId);

        return view('client.playlists.show')
            ->with([
                'favorites' => $favorites,
                'obj' => $obj,
            ]);
    }
}
