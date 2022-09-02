<x-layout>
    <section class="px-6 py-8">
        <main class="flex flex-col items-center justify-center mt-[79px]">
            <div class="shadow-2xl px-12 py-4 pt-12 rounded-xl" style="background-color: #292929">
            
                <h1 class="text-2xl py-4">Log In:</h1>
        
                <form action="/login" method="POST" enctype="multipart/form-data">
                    @csrf

                    <x-form.input name="email" />
                    <x-form.input name="password" type="password" />
        
                    <x-form.button>Log In</x-form.button>
                </form>
        
                </div>
        </main>
    </section>
</x-layout>