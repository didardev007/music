<?php

namespace App\Http\Controllers\Admin;

use App\Models\Track;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tracks = Track::orderBy('id', 'desc')
            ->with('artist', 'album', 'genre')
            ->get();

        $inFavorites = User::with('checkFavorite')->count();

        return view('admin.track.index', compact('tracks', 'inFavorites'));
    }

}
