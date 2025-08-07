@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <div class="flex justify-between">
            <h1 class="text-2xl mb-5 font-semibold flex">Atur Variabel</h1>

            <a href="/template/detail-template/{{ $code }}" class="btn btn-sm btn-error text-white">Kembali</a>
        </div>

        @livewire('template.list-asset-cover-section', ['code' => $code])

        @livewire('template.upload-asset-template-modal', ['code' => $code, 'type' => 'cover'])

    </main>
@endsection
