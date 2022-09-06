<x-layout>
    
        <x-setting>
            <form action="/movies/{{ $movie->id }}" method="POST" enctype="multipart/form-data" class="m-20 mx-60">
                @csrf
                @method('PATCH')

                <x-form.input name="title_en" value="{{ $en }}" />
                <x-form.input name="title_ka" value="{{ $ka }}" />
                <x-form.button>{{__('text.edit')}}</x-form.button>
                
            </form>
        </x-setting>

</x-layout>