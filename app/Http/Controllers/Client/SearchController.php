<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Artist::where('name', 'LIKE', '%' . $query . '%')
            ->get();

        $results1 = Track::where('name', 'LIKE', '%' . $query . '%')
            ->get();

        $results2 = Album::where('name', 'LIKE', '%' . $query . '%')
            ->get();

        return view('client.search.results')
            ->with([
                'query' => $query,
                'results' => $results,
                'results1' => $results1,
                'results2' => $results2,
            ]);
    }
}
