<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Artist::where('name', 'LIKE', '%' . $query . '%')
            ->get();

        return view('client.search.results', ['query' => $query, 'results' => $results]);
    }
}
