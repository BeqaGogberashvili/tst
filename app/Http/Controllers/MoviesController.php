<?php

namespace App\Http\Controllers;

use App\Models\Movies;

class MoviesController extends Controller
{
	public function create()
	{
		return view('posts.create-movie');
	}

	public function store()
	{
		$attributes = request()->validate([
			'name'       => 'required|unique:movies',
			'slug'       => 'required',
		]);

		Movies::create($attributes);

		return redirect('/');
	}
}
