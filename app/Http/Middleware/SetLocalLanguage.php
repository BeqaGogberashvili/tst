<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SetLocalLanguage
{
	public function handle(Request $request, Closure $next): Response
	{
		if (session()->has('lang'))
		{
			dd(1);
			app()->setLocale(session('lang'));
		}
		else
		{
			dd(2);
			app()->setLocale(config('app.locale'));
		}
		return $next($request);
		$lang = session('lang', 'en');
		app()->setLocale($lang);
		return $next($request);
	}
}
