<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Jangan Cuek Pliss...">
    <title>CUPLISIT</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jockey+One&family=Jost:wght@100;800&family=Montserrat&display=swap');
    </style>
</head>
<body class="bg-bodyBG flex lg:px-0 px-20 overflow-hidden h-screen justify-center items-center" style="font-family: 'Jockey One', sans-serif">
    {{-- sidebar --}}
    @include('sidebarUser')
    {{-- sidebarRight --}}
    @include('sidebarUserRight')
    {{-- header --}}
    @include('headerUser')
    {{-- content --}}
    @yield('content')
</body>
</html>
