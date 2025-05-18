<!DOCTYPE html>
<html data-theme="corporate" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    @vite('resources/css/app.css')

</head>

<body>

    {{-- navbar --}}
    <nav class="navbar bg-base-100 shadow-sm fixed h-16 px-5 z-50">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">{{ env('APP_NAME') }}</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a class="link link-secondary link-hover mr-2">Daftar sekarang</a></li>
                <li><a class="btn btn-sm btn-primary">Login</a></li>
            </ul>
        </div>
    </nav>
    {{-- end navbar --}}

    <div class="flex gap-2 pt-16 min-h-[700px] -z-50">
        @livewire('components.sidebar')

        @yield('main-section')
    </div>

</body>

</html>
