<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if (auth()->attempt($attributes))
		{
			session()->regenerate();
			return redirect('/');
		}

		return back()->withErrors(['email' => 'Incorrect Email or Passowrd']);
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/');
	}
}
