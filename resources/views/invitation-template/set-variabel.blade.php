@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Atur variabel </h1>

        @livewire('components.alert-success')

        @livewire('invitation-template.section-template', ['code' => $code])

        @livewire('invitation-template.list-variabel', ['code' => $code])

        @livewire('invitation-template.create-variabel-modal', ['code' => $code])

    </main>
@endsection
