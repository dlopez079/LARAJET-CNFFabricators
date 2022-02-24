<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>C&F Fabricators</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/bf5de05bdc.js" crossorigin="anonymous"></script>

    <!-- Livewire Script -->
    @livewireStyles

    <!-- Inter font family -->
    <!-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> -->

    <!-- Alphine JS. -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>

<body class="antialiased">
    <div>

            @livewire('hero-section')
            @livewire('gallery-section')
            @livewire('service-section')
            @livewire('about-section')
            @livewire('logo-clouds-section')
            @livewire('contact-section')

    </div>

    @livewireScripts
</body>

</html>
