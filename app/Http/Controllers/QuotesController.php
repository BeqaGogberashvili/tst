<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Quotes;
use App\Models\Movies;
use Illuminate\Support\Facades\File;

class QuotesController extends Controller
{
	public function index()
	{
		return view('components.quote-list', [
			'movies' => Movies::all(),
			'quotes' => Quotes::latest()->paginate(5),
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
			'title_en'       => 'required',
			'title_ka'       => 'required',
			'thumbnail'      => 'required|image',
			'movie_id'       => ['required', Rule::exists('movies', 'id')],
		]);

		$quote = new Quotes();

		$quote->setTranslation('quote', 'en', $attributes['title_en']);
		$quote->setTranslation('quote', 'ka', $attributes['title_ka']);
		$quote->thumbnail = request()->file('thumbnail')->store('images');
		$quote->movie_id = $attributes['movie_id'];

		$quote->save();

		return redirect('/quote/list');
	}

	public function edit(Quotes $quote)
	{
		return view('posts.edit-quotes', [
			'quote'  => $quote,
			'en'     => $quote->getTranslation('quote', 'en'),
			'ka'     => $quote->getTranslation('quote', 'ka'),
		]);
	}

	public function update(Quotes $quote)
	{
		$attributes = request()->validate([
			'title_en'       => 'required',
			'title_ka'       => 'required',
			'movie_id'       => ['required', Rule::exists('movies', 'id')],
		]);

		if (isset($attributes['thumbnail']))
		{
			File::delete('storage/' . $quote->thumbnail);
			$attributes['thumbnail'] = request()->file('thumbnail')->store('images');
			$quote->thumbnail = request()->file('thumbnail')->store('images');
		}

		$quote->setTranslation('quote', 'en', $attributes['title_en']);
		$quote->setTranslation('quote', 'ka', $attributes['title_ka']);
		$quote->movie_id = $attributes['movie_id'];

		$quote->save();
		return redirect('/quote/list');
	}

	public function destroy(Quotes $quote)
	{
		File::delete('storage/' . $quote->thumbnail);
		$quote->delete();
		return redirect('/quote/list');
	}
}
