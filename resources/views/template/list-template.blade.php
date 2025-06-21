@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">List template</h1>

        @livewire('components.alert-success')

        <div class="flex justify-end mb-4">
            @livewire('components.button-open-create-template')
        </div>

        @livewire('template.list-template')

        @livewire('template.create-template-modal-form')

    </main>
@endsection
