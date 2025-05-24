@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">

        <h1 class="text-3xl mb-5">List template</h1>

        @livewire('components.alert-success')

        @livewire('invitation-template.list-template')

        @livewire('components.create-theme-modal-form')

    </main>
@endsection
