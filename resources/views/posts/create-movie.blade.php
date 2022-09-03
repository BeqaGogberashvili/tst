<x-layout>

    <x-setting heading="Add Movie:">
        <form action="/movies" method="POST" enctype="multipart/form-data" class="mx-60 my-20">
            @csrf
            <x-form.input name="name" />
            <x-form.input name="slug" />
            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>

</x-layout>