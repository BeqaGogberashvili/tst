<section>
    <main class="flex justify-center mt-[156px]" >
    <div class="flex">
        <aside class="w-48">
            <ul>
                <li>
                    <a href="/movie/list" class="{{ request()->is('movie/list') ? 'text-blue-500' : '' }}">Movie List</a>
                </li>
                <li>
                    <a href="/quote/list" class="{{ request()->is('quote/list') ? 'text-blue-500' : '' }}">Quote List</a>
                </li>
                <li>
                    <a href="/movies/create" class="{{ request()->is('movies/create') ? 'text-blue-500' : '' }}">Add Movie</a>
                </li>
                <li>
                    <a href="/quotes/create" class="{{ request()->is('quotes/create') ? 'text-blue-500' : '' }}">Add Quote</a>
                </li>
            </ul>
        </aside>
    </div>
    
    <div class="shadow-2xl p-20 min-h-[600px] rounded-lg w-[60%]" style="background-color: #292929">
        {{ $slot }}
    </div>

    </main>

</section>