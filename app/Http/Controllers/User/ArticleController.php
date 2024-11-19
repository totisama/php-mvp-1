<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	public function index()
	{
		$userId = auth()->user()->id;

		if (!$userId) {
			abort(401);
		}

		$articles = Article::where('author_id', $userId)->get();

		return view('user.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('user.articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title' => ['required', 'string', 'min:5', 'max:255'],
			'content' => ['required', 'string'],
		]);

		$userId = auth()->user()->id;

		if (!$userId) {
			abort(401);
		}

		Article::create([
			'title' => $request->title,
			'content' => $request->content,
			'author_id' => $userId,
		]);

		session()->flash('success', 'Article created successfully!');

		return redirect()->route('user.articles.index');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$article = Article::findOrFail($id);

		return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$article = Article::find($id);

		return view('user.articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		$request->validate([
			'title' => ['required', 'string', 'min:5', 'max:255'],
			'content' => ['required', 'string'],
			'author_id' => ['required', 'numeric'],
		]);

		$article = Article::find($id);

		$article->update([
			'title' => $request->title,
			'content' => $request->content,
			'author_id' => $request->author_id,
		]);

		session()->flash('success', 'Article updated successfully!');

		return redirect()->route('user.articles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$article = Article::findOrFail($id);

		$article->delete();

		session()->flash('success', 'Article deleted successfully!');

		return redirect()->route('user.articles.index');
	}
}
