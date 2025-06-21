@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">List template</h1>

        @livewire('components.alert-success')

        <div class="flex justify-end mb-4">
            @livewire('components.button-open-create-template')
        </div>

        @for ($i = 0; $i < 10; $i++)
            <section class="w-full bg-base-100 mb-5 p-4 rounded-xl shadow-lg">
                <div class="flex justify-between">
                    <h2 class="text-xl mb-5">Nama template</h2>
                    <a href="" class="btn btn-secondary btn-sm">Private</a>
                </div>

                <div class="flex mb-2">
                    <div class="border border-slate-400 h-44 w-32 bg-slate-100 m-2">
                    </div>

                    <div class="border border-slate-400 h-44 w-32 bg-slate-100 m-2">
                    </div>

                    <div class="border border-slate-400 h-44 w-32 bg-slate-100 m-2">
                    </div>
                </div>

                {{-- footer --}}
                <div class="flex justify-end">
                    <a class="btn btn-sm btn-warning ml-2">Preview</a>
                    <a href="/template/detail-template/lskadjf" class="btn btn-sm btn-primary ml-2">Detail template</a>
                </div>
            </section>
        @endfor

        @livewire('template.create-template-modal-form')

    </main>
@endsection
