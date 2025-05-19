<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('q');

        $results = Post::where('post', 'LIKE', "%$query%")->latest()->paginate(10)->withQueryString();

        view()->share('title', 'Search - ' . $query);

        return view('search', compact('query', 'results'));
    }
}
