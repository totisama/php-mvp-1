<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index()
	{
		$articles = Article::all();

		return view('user.articles.index', compact('articles'));
	}

	public function edit(string $id)
	{
		$article = Article::find($id);

		return view('user.articles.edit', compact('article'));
	}

	public function update(Request $request, string $id)
	{
		$request->validate([
			'title' => ['required', 'string', 'min:5', 'max:255'],
			'content' => ['required', 'string'],
		]);

		$article = Article::find($id);

		$article->update([
			'title' => $request->title,
			'content' => $request->content,
		]);

		return redirect()->route('user.articles.index');
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => ['required', 'string', 'min:5', 'max:255'],
			'content' => ['required', 'string'],
		]);

		Article::create([
			'title' => $request->title,
			'content' => $request->content,
			'author_id' => '1',
		]);

		session()->flash('success', 'Article created successfully!');

		return redirect()->route('user.articles.index');
	}

	public function show(string $id)
	{
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}


	public function create()
	{
		return view('user.articles.create');
	}

	public function destroy(string $id)
	{
		$article = Article::findOrFail($id);

		$article->delete();

		session()->flash('success', 'Article deleted successfully!');

		return redirect()->route('user.articles.index');
	}
}
