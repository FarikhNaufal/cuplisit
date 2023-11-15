<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Jangan Cuek Pliss...">
    <title>CUPLISIT</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jockey+One&family=Jost:wght@100;800&family=Montserrat&display=swap');
    </style>
</head>
<body class="bg-bodyBG flex overflow-hidden" style="font-family: 'Jockey One', sans-serif">
    {{-- sidebar --}}
    @include('templates.partials.aside')
    <div class="relative w-full flex flex-col h-screen">
        {{-- navbar --}}
        @livewire('navbar')
        <div class="lg:p-9 p-4 overflow-scroll max-h-max lg:overflow-hidden">
            {{-- content --}}
            @yield('content')
        </div>
    </div>
    @livewireScripts


</body>
    <!-- AlpineJS -->
    @yield('script')
</html>
