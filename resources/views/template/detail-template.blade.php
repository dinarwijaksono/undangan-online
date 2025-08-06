@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl mb-5">Detail template</h1>

            <a href="/template" class="btn btn-sm btn-error text-white">Kembali</a>
        </div>

        @livewire('components.alert-success')
        @livewire('template.upload-asset-template-modal', ['code' => $code])

        @livewire('template.description-template-section', ['template' => $template])

        @livewire('template.html-content-template-section', ['template' => $template])

        @livewire('template.list-asset-css-section', ['template' => $template])

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-xl mb-5">Js asset</h2>

                <button class="btn btn-primary btn-sm">Tambah asset</button>
            </div>

            <section class="flex">
                <div class="border basis-6/12 border-slate-300 p-2">logic.js</div>
                <div class="flex justify-end border basis-6/12 border-slate-300 p-2">
                    <button class="btn btn-sm btn-error text-white">Hapus</button>
                </div>
            </section>

            <section class="mt-4">
                <textarea class="bg-slate-200 rounded-sm h-20 w-full"></textarea>
            </section>

        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-xl mb-5">img asset</h2>
            </div>

            <div class="grid grid-cols-4 gap-2">
                <div class="flex items-center bg-slate-200 rounded h-80 p-2 shadow-xl">
                    <div class="flex justify-center w-full">
                        <button class="btn btn-sm btn-primary">Tambah asset</button>
                    </div>
                </div>

                <div class="flex items-end bg-slate-200 rounded h-80 p-2 shadow-xl">
                    <div class="flex justify-around w-full">
                        <button class="btn btn-sm btn-primary text-white">Copy link</button>
                        <button class="btn btn-sm btn-error text-white">Hapus</button>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
