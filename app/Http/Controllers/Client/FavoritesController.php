<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addToFavorites($trackId)
    {
        $user = auth()->user();
        $user->tracks()->attach($trackId);

        return redirect()->back()->with('success', 'Added to Favorites');
    }

    public function removeFromFavorites($trackId)
    {
        $user = auth()->user();
        $user->tracks()->detach($trackId);

        return redirect()->back()->with('success', 'Removed from Favorites');
    }

    public function showFavorites($playlistId, $userId) {
        $favorites = User::with(['tracks' => function ($query) {
            $query->with('artist', 'album', 'genre');
            $query->orderBy('id');
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
