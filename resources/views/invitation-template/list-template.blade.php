@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">

        @livewire('invitation-template.list-template')

        @livewire('components.create-theme-modal-form')

    </main>
@endsection
