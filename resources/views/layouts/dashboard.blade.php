<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased  min-h-screen">
<div class="flex min-h-screen" x-data="{ isOpenMenu: window.innerWidth > 770 }"
    x-init="() => {
    const updateMenuState = () => {
             isOpenMenu = window.innerWidth > 768;
         };
         updateMenuState();
         window.addEventListener('resize', () => {
             clearTimeout(window.resizedFinished);
             window.resizedFinished = setTimeout(updateMenuState, 100);
         });
    }"
>
    <aside
        :class="{ 'hidden': !isOpenMenu, 'block': isOpenMenu }"
        class="fixed top-0 bottom-0 bg-[#0a0a0a] w-24 hidden md:block" x-show="isOpenMenu" x-transition>
        <div class="">
            @livewire('helpers.dashboard-navigation')
        </div>
    </aside>
    <main class="bg-purple-50 flex-1 p-4">
        <button @click="isOpenMenu = !isOpenMenu" class="block md:hidden">
            <x-menu class="w-8 h-8" />
        </button>
        {{ $slot }}
    </main>
</div>
@stack('scripts')
</body>
</html>
