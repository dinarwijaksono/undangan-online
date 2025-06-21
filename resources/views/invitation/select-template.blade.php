@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Pilih Tema</h1>

        @for ($i = 0; $i < 5; $i++)
            <section class="w-full bg-base-100 mb-5 p-4 rounded-xl shadow-lg">
                <div class="flex justify-between">
                    <h2 class="text-xl mb-5">Nama template</h2>
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
                    <a href="/invitation/create-invitation/lskadjf" class="btn btn-sm btn-primary ml-2">Gunakan template
                        ini</a>
                </div>
            </section>
        @endfor
    </main>
@endsection
