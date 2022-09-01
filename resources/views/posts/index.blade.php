<x-layout>

    <nav class="p-6 border-b">

        @auth

            <div class="flex items-center">

                <span class="pr-14">Wellcome, {{ auth()->user()->name }}</span>
                <form action="/logout" method="post"class="px-8 mx-4">
                @csrf
                    <button type="submit">Log Out</button>
                </form>
                <a href="movies/create" class="px-8 mx-4">Add Movie</a>
                <a href="quotes/create" class="px-8 mx-4">Add Quote</a>

            </div>

        @else
            <a href="/login" class="px-4">Log In</a>
            <a href="/register" class="px-4">Register</a>
        @endauth

    </nav>

    <main class="flex flex-col items-center justify-center mt-[156px]">
        
        @if ($movies->count() && $quotes->count())

		<?php
            $random = rand(0, $quotes->count() - 1);
            $quote = $quotes[$random];
        ?>

        <img src="storage/{{ $quote->thumbnail }}" alt="movie-quote-image" style="object-fit: cover; width: 700px; height: 386px;" class="rounded-lg">

        <h1 class="text-[48px] mt-[65px]" style="font-weight: 400" >"{{ $quote->quote }}"</h1>

        <a href="movies/{{ $quote->movie->slug }}" class="underline text-[48px] mt-[114px]">{{ $quote->movie->name }}</a>

        @else

        <h2>There are no posts yet.</h2>

        @endif
        
    </main>
    
</x-layout>












