<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlePublishController extends Controller
{
    public function __invoke(int $id, Request $request)
    {
        $article = \App\Models\Article::findOrFail($id);

        $userId = auth()->user()->id;

        $article->isAuthorized($userId);

        $article->update([
            'published_at' => now(),
        ]);

        session()->flash('success', 'Article published successfully!');

        return redirect()->back();
    }
}
