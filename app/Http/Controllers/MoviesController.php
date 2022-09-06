<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movies;
use App\Models\Quotes;

class MoviesController extends Controller
{
	public function index()
	{
		return view('components.movie-list', [
			'movies' => Movies::latest()->paginate(5),
		]);
	}

	public function create()
	{
		return view('posts.create-movie');
	}

	public function store(StoreMovieRequest $request)
	{
		$post = new Movies();

		$post->setTranslation('title', 'en', $request->title_en);
		$post->setTranslation('title', 'ka', $request->title_ka);

		$post->save();

		return redirect('/movie/list');
	}

	public function show(Movies $movie)
	{
		return view('posts.movies', [
			'movies' => Quotes::all()->where('movie_id', $movie->id),
			'name'   => $movie->title,
		]);
	}

	public function edit(Movies $movie)
	{
		$movie->getTranslation('title', 'en');
		return view('posts.edit-movies', [
			'movie'  => $movie,
			'en'     => $movie->getTranslation('title', 'en'),
			'ka'     => $movie->getTranslation('title', 'ka'),
		]);
	}

	public function update(Movies $movie)
	{
		$attributes = request()->validate([
			'title_en'       => 'required',
			'title_ka'       => 'required',
		]);

		$movie->setTranslation('title', 'en', $attributes['title_en']);
		$movie->setTranslation('title', 'ka', $attributes['title_ka']);

		$movie->save();
		return redirect('/movie/list');
	}

	public function destroy(Movies $movie)
	{
		$movie->delete();
		return redirect('/movie/list');
	}
}
