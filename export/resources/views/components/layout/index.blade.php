@cascade

@props([
    'title',
    'description'   => false,
    'site_name'     => 'build.jamesevers',
    'robots'        => false,
    'sidebar'       => false,
])


<!doctype html>
<html lang="en" data-theme="light" class="[ !overflow-y-scroll scroll-smooth ]">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">

        {{-- SEO --}}
        @include('components.layout.partials.seo')

        {{-- Make sure hidden content doesn't flash up before CSS loads --}}
        <style>[x-cloak] { display: none !important; }</style>

        {{-- Critical styles --}}
        @vite(['resources/css/site.css'])

        {{-- Additional styles --}}
        @stack('styles')

        {{-- Web Component Scripts --}}
        @stack('web-components')
    </head>

    <body {{ $attributes->merge(['class' => 'preload']) }}>
        {{ $slot }}

        {{-- Scripts --}}
        @vite(['resources/js/site.js'])

        {{-- Additional scripts --}}
        @stack('scripts')
    </body>
</html>