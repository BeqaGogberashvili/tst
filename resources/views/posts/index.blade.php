<x-layout>

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

        <h2 class="mt-60">There are no posts yet.</h2>

        @endif
        
    </main>
    
</x-layout>












