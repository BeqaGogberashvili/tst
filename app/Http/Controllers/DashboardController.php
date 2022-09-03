<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Quotes;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
	public function moviesIndex()
	{
		return view('components.movie-list', [
			'movies' => Movies::paginate(15),
		]);
	}

	public function quotesIndex()
	{
		return view('components.quote-list', [
			'movies' => Movies::paginate(5),
			'quotes' => Quotes::latest()->paginate(5),
		]);
	}

	public function editQuote(Quotes $quote)
	{
		return view('posts.edit-quotes', ['quote' => $quote]);
	}

	public function editMovie(Movies $movie)
	{
		return view('posts.edit-movies', ['movie' => $movie]);
	}

	public function updateQuote(Quotes $quote)
	{
		$attributes = request()->validate([
			'quote'       => 'required',
			'thumbnail'   => 'image',
			'movie_id'    => ['required', Rule::exists('movies', 'id')],
		]);

		if (isset($attributes['thumbnail']))
		{
			$attributes['thumbnail'] = request()->file('thumbnail')->store('images');
		}

		$quote->update($attributes);

		return redirect('/quote/list');
	}

	public function updateMovie(Movies $movie)
	{
		$attributes = request()->validate([
			'name'       => 'required|unique:movies',
			'slug'       => 'required',
		]);

		$movie->update($attributes);

		return redirect('/movie/list');
	}

	public function destroyQuote(Quotes $quote)
	{
		File::delete('storage/' . $quote->thumbnail);
		$quote->delete();
		return redirect('/quote/list');
	}

	public function destroyMovie(Movies $movie)
	{
		$movie->delete();
		return redirect('/movie/list');
	}
}
