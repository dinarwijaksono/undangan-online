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
    <nav class="navbar bg-base-100 shadow-sm fixed h-16 px-5">
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

    <section class="flex justify-start px-10 pb-16 pt-32 bg-base-200">

        <div class="basis-5/12">
            <div class="w-full p-4">

                <h1 class="text-4xl font-bold">Buat Undangan Pernikahan Digital dalam Hitungan Menit!</h1>
                <p class="mt-3">Pilih template, sesuaikan isi, bagikan ke tamu tanpa repot.</p>

                <button class="btn btn-secondary shadow rounded-2xl mt-3">Pesan sekarang</button>

            </div>
        </div>

        <div class="basis-5/12">
        </div>

    </section>

    <section class="flex justify-end px-10 py-16 bg-base-100">

        <div class="basis-5/12">
            <div class="w-full p-4">
                <h1 class="text-4xl font-bold">Fitur unggulan</h1>

                <ul class="mt-3 order-1 list-disc ml-5">
                    <li class="mb-1">Desain responsif (PC / HP)</li>
                    <li class="mb-1">RSVP Otomatis</li>
                    <li class="mb-1">Link kirim kado / e-money</li>
                    <li class="mb-1">Google map lokasi</li>
                    <li class="mb-1">Galery foto</li>
                </ul>
            </div>
        </div>

    </section>

    <section class="flex justify-center px-10 py-16 bg-base-200">
        <div class="basis-10/12">
            <div class="w-full p-4">
                <h1 class="text-4xl font-bold text-center mb-10">Pilihan Template</h1>

                <div class="grid grid-cols-3 gap-5">
                    @for ($i = 0; $i < 6; $i++)
                        <div>
                            <div class="w-full h-44 bg-base-300 border rounded-2xl">
                                gambar
                            </div>

                            <div class="flex gap-3 mt-3 px-3">
                                <div class="basis-6/12">
                                    <button class="btn btn-error text-white btn-sm w-full">Preview</button>
                                </div>

                                <div class="basis-6/12">
                                    <button class="btn btn-info text-white btn-sm w-full">Pesan</button>
                                </div>
                            </div>

                        </div>
                    @endfor
                </div>

                <div class="mt-10 text-center">
                    <a href="#" class="btn btn-sm btn-secondary text-white w-5/12">Lihat semua tema</a>
                </div>

            </div>
        </div>
    </section>

</body>

</html>
