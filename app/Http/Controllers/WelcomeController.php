<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $articles = Article::published()->get()->sortByDesc('published_at');

        return view('welcome')->with('articles', $articles);
    }
}
