<x-layout>
    
        <x-setting>
            <form action="/movies/{{ $movie->id }}" method="POST" enctype="multipart/form-data" class="m-20 mx-60">
                @csrf
                @method('PATCH')

                <x-form.input name="name" value="{{ $movie->name }}" />
                <x-form.input name="slug" value="{{ $movie->slug }}" />
                <x-form.button>Submit</x-form.button>
                
            </form>
        </x-setting>

</x-layout>