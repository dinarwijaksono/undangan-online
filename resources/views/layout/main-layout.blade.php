<!DOCTYPE html>
<html data-theme="corporate" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="/assets/fontawesome-free-6.7.2-web/css/fontawesome.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free-6.7.2-web/css/brands.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free-6.7.2-web/css/solid.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free-6.7.2-web/css/sharp-thin.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free-6.7.2-web/css/duotone-thin.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free-6.7.2-web/css/sharp-duotone-thin.css" rel="stylesheet" />

    @vite('resources/css/app.css')

</head>

<body>

    @livewire('components.navbar')

    <div class="flex gap-2 pt-16 min-h-[700px] -z-50">
        @livewire('components.sidebar')

        @yield('main-section')
    </div>

</body>

</html>
