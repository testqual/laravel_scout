<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Basic search
        $posts = Post::search($query)->get();

        // With pagination
        $posts = Post::search($query)->paginate(15);

        // Add where clauses
        $posts = Post::search($query)
            ->where('user_id', auth()->id())
            ->get();

        // Custom index or advanced options (e.g., for geo-filtering with compatible drivers)
        $posts = Post::search($query, function ($engine, $query, $options) {
            // Customize engine-specific options here (e.g., for Algolia/Meilisearch)
            return $engine->search($query, $options);
        })->get();

        return view('search.results', compact('posts'));
    }
}
