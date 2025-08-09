@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl mb-5">Atur Variabel</h1>

            <a href="/template/detail-template/{{ $code }}" class="btn btn-sm btn-error text-white">Kembali</a>
        </div>

        @livewire('template.description-template-section', ['template' => $template])

        @livewire('template-variabel.list-template-variabel-component', ['templateId' => $template->id])

        @livewire('template-variabel.store-template-variabel-modal-component', ['templateId' => $template->id])

    </main>
@endsection
