<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Quotes;
use App\Models\Movies;

class QuotesController extends Controller
{
	public function index()
	{
		return view('posts.index', [
			'movies' => Movies::all(),
			'quotes' => Quotes::all(),
		]);
	}

	public function create()
	{
		return view('posts.create-quotes');
	}

	public function store()
	{
		request()->file('thumbnail')->store('images');

		$attributes = request()->validate([
			'quote'       => 'required',
			'thumbnail'   => 'required|image',
			'movie_id'    => ['required', Rule::exists('movies', 'id')],
		]);

		$attributes['thumbnail'] = request()->file('thumbnail')->store('images');

		Quotes::create($attributes);

		return redirect('/dashboard');
	}

	public function show(Movies $movie)
	{
		return view('posts.movies', [
			'movies' => Quotes::all()->where('movie_id', $movie->id),
			'name'   => $movie->name,
		]);
	}
}
