<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Quotes;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
	public function index()
	{
		return view('components.dashboard', [
			'movies' => Movies::paginate(5),
			'quotes' => Quotes::latest()->paginate(5),
		]);
	}

	public function edit(Quotes $quote)
	{
		return view('posts.edit-quotes', ['quote' => $quote]);
	}

	public function update(Quotes $quote)
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

		return redirect('/dashboard');
	}

	public function destroy(Quotes $quote)
	{
		File::delete('storage/' . $quote->thumbnail);
		$quote->delete();
		return redirect('/dashboard');
	}
}
