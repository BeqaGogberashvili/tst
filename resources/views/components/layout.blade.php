<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
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

    {{ $slot }}

</body>
</html>


