<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
</head>

<style>
    @font-face {
    font-family: Sansation;
    src: url('fonts/Sansation_Regular.ttf');
    }
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    html{
        font-family: Sansation;
    }
    body{
        background: #3C3B3B;
        color: white;
    }
    a{
        color: white;
        text-decoration: under;
    }
    a:hover{
        text-decoration: underline
    }
</style>
<body>

    <nav class="p-6">

        <div class="flex items-center justify-end">
        @auth
        <x-dropdown>

            <x-slot name="trigger">
                <button>Wellcome, {{ auth()->user()->name }}!</button>
            </x-slot>

            <x-dropdown-item href="/movies/create">
                Add Movie
            </x-dropdown-item>

            <x-dropdown-item href="/quotes/create">
                Add Quote
            </x-dropdown-item>

        </x-dropdown>
            

            <form action="/logout" method="post"class="px-8 mx-4">
                @csrf
                <button type="submit">Log Out</button>
            </form>

        @else
            <a href="/login" class="px-4">Log In</a>
            <a href="/register" class="px-4">Register</a>
        @endauth
    </div>

    </nav>

    {{ $slot }}

</body>
</html>


