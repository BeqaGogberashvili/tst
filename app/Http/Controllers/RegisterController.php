<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
	public function create()
	{
		return view('register.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'name'     => 'required|min:4|max:255',
			'email'    => 'required|email|max:255',
			'password' => 'required|min:4|max:255',
		]);

		$attributes['password'] = bcrypt($attributes['password']);

		$user = User::create($attributes);

		auth()->login($user);

		return redirect('/');
	}
}
