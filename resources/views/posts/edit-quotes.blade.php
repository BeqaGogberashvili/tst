<x-layout>
    
        <x-setting>
            <form action="/quotes/{{ $quote->id }}" method="POST" enctype="multipart/form-data" class="m-10">
                @csrf
                @method('PATCH')

                <x-form.input name="quote" value="{{ $quote->quote }}" />
                <img src="{{ asset('storage/' . $quote->thumbnail) }}" class="w-full">
                <x-form.input name="thumbnail" type="file" value="{{ $quote->thumbnail }}" />
                <x-form.label name="movies" />
    
                <select name="movie_id" id="movie_id" class="mb-14 border border-[#292828] w-full rounded-sm outline-0 px-4 py-2" style="background: #474646">
    
                    @php
                        $movies = \App\Models\Movies::all();
                    @endphp
                
                    @foreach ($movies as $movie)
                        <option 
                            value="{{ $movie->id }}" 
                            {{ old('movie_id', $quote->movie_id) == $movie->id ? 'selected' : '' }}>
                            {{ ucwords($movie->name) }}
                        </option>
                    @endforeach
                
                </select>
    
                <x-form.button>Submit</x-form.button>
            </form>
        </x-setting>

</x-layout>