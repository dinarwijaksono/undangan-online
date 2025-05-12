<!DOCTYPE html>
<html data-theme="fantasy" lang="en">

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
                <li><a class="btn btn-sm btn-secondary">Login</a></li>
            </ul>
        </div>
    </nav>
    {{-- end navbar --}}

    <div class="flex gap-2 pt-16 min-h-[700px] -z-50">
        @livewire('components.sidebar')

        <main class="basis-10/12 px-4 bg-base-200 py-6">
            <h1 class="text-3xl mb-5">Beranda</h1>

            <div role="alert" class="alert alert-error mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Error! Task failed successfully.</span>
            </div>

            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Alias eius deleniti consectetur vel,
                necessitatibus quod ex ab temporibus magni incidunt.</p>
        </main>
    </div>

</body>

</html>
