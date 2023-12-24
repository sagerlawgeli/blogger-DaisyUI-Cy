<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('/favicon.ico') }}" color="#ff2d20">

    {{--  Meta description  --}}
    <meta name="description" content="Paper - MaryUI demo">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50">

<x-nav sticky class="lg:hidden">
    <x-slot:brand>
        {{-- Drawer toggle for "main-drawer" --}}
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>

        <livewire:paper-brand />
    </x-slot:brand>
</x-nav>

<x-main>
    <x-slot:sidebar drawer="main-drawer" class="bg-base-200 lg:bg-transparent">
        <div class="ml-5 my-8">
            <livewire:paper-brand />
        </div>

        <div class="mx-3">
            {{-- User --}}
            @if($user = auth()->user())
                <x-list-item :item="$user" value="username" link="/profile" no-separator>
                    <x-slot:actions>
                        <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" link="/logout" tooltip-left="logoff" />
                    </x-slot:actions>
                </x-list-item>
            @endif

            <hr class="mb-5" />

            <x-button label="New discussion" link="/posts/create" icon="o-plus" class="btn-primary btn-block" />
        </div>
    </x-slot:sidebar>

    {{-- The `$slot` goes here --}}
    <x-slot:content class="mb-20 lg:max-w-5xl">
        {{ $slot }}

        <div class="flex mt-10">
            <x-button label="Source code" icon="o-code-bracket" link="https://github.com/robsontenorio/paper.mary-ui.com" class="btn-ghost" external />
            <x-button label="Built with MaryUI" icon="o-heart" link="https://mary-ui.com" class="btn-ghost !text-pink-500" external />
        </div>
    </x-slot:content>
</x-main>

{{-- TOAST --}}
<x-toast />

</body>
</html>
