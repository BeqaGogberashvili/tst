<x-layout>
    <section>

        <main class="flex flex-col items-center justify-center mt-[156px]" >

        <div class="shadow-2xl px-12 py-4 pt-12 rounded-xl" style="background-color: #292929">
            
        <h1 class="text-2xl py-4">Add Movie:</h1>

        <form action="/movies" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name" />
            <x-form.input name="slug" />
            <x-form.button>Submit</x-form.button>
        </form>

        </div>

        </main>

    </section>

</x-layout>