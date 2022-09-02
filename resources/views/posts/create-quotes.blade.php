<x-layout>
    <section>

        <main class="flex flex-col items-center justify-center mt-[156px]" >

        <div class="shadow-2xl px-12 py-4 pt-12 rounded-xl" style="background-color: #292929">
            
        <h1 class="text-2xl py-4">Submit Quote:</h1>

        <form action="/quotes" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="quote" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.label name="movies" />

            <select name="movie_id" id="movie_id" class="mb-14 border border-[#292828] w-full rounded-sm outline-0 px-4 py-2" style="background: #474646">

                @php
                    $movies = \App\Models\Movies::all();
                @endphp
            
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ old('movie_id') == $movie->id ? 'selected' : '' }}>{{ ucwords($movie->name) }}</option>
                @endforeach
            
            </select>

            <x-form.button>Submit</x-form.button>
        </form>

        </div>

        </main>

    </section>

</x-layout>