<x-layout>
    <x-setting>

        {{-- @foreach ($movies as $movie)
            <h1>{{ $movie->name }}</h1>
        @endforeach --}}

    <div>
        <div class="min-h-[360px]">
        @if ($quotes->count())
        <table class="w-full">
            <tr class="font-semibold text-xl ">
                <td class="pb-10">Quote:</td>
                <td class="pb-10">Movie:</td>
            </tr>

        @foreach ($quotes as $quote)
            <tr class=" border-b border-[#3C3B3B] hover:bg-[#333232]">
                <td class="pl-2 py-4 pr-12 w-[500px] h-11">"{{ $quote->quote }}"</td>
                <td class="py-4 pr-[200px]"><a href="movies/{{ $quote->movie->slug }}">{{ $quote->movie->name }}</a></td>
                <td>
                    <a href="/quotes/{{ $quote->id }}/edit">Edit</a>
                </td>
                <td>
                    <form action="/quotes/{{ $quote->id }}" class="ml-20" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>

        @else
            <h1 class="flex justify-center">There are no quotes</h1>
        @endif
    </div>
        <div class="pt-4 px-12 mt-12 text-white-500">
            {{ $quotes->links() }}
        </div>
    </div>
    </x-setting>
</x-layout>