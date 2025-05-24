@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Atur variabel </h1>

        @livewire('invitation-template.section-template', ['code' => $code])

        <section class="mb-5 overflow-x-auto p-4 rounded-lg bg-base-100">
            <h1 class="mb-5 text-2xl">Variabel</h1>

            <table class="table border-collapse border border-slate-300 mb-4">
                <thead>
                    <tr>
                        <th class="border border-slate-300 text-center">No</th>
                        <th class="border border-slate-300 text-center">Nama Variabel</th>
                        <th class="border border-slate-300"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-slate-300 w-1/12 text-center">1</td>
                        <td class="border border-slate-300 w-9/12">Nama laki-laki</td>
                        <td class="border border-slate-300 w-2/12">
                            <button class="btn btn-error btn-sm w-full text-white">Hapus</button>
                        </td>
                    </tr>

                    <tr>
                        <td class="border border-slate-300 w-1/12 text-center">2</td>
                        <td class="border border-slate-300 w-9/12">Nama perempuan</td>
                        <td class="border border-slate-300 w-2/12">
                            <button class="btn btn-error btn-sm w-full text-white">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-center">
                <div class="basis-8/12">
                    <button class="btn btn-info w-full btn-sm">Tambah Variabel</button>
                </div>
            </div>
        </section>

        {{-- <div class="fixed z-50 left-0 top-0 right-0 bottom-0 flex items-center justify-center bg-slate-500/55"> --}}
        <section class="mb-5 overflow-x-auto p-6 rounded-lg bg-base-100  border border-slate-300 shadow-lg w-8/12">
            <div>
                <h3 class="text-lg font-bold mb-5">Tambah Variabel</h3>

                <div class="mb-4">
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Variabel</legend>
                        <input type="text" class="input w-full" placeholder="My awesome page" />
                        <p class="label text-error italic">You can edit page title later on from settings</p>
                    </fieldset>
                </div>

                <div class="mb-4 flex justify-end gap-2">
                    <div class="basis-2/12">
                        <button class="btn btn-error text-white btn-sm w-full">Batal</button>
                    </div>

                    <div class="basis-2/12">
                        <button class="btn btn-primary btn-sm w-full">Simpan</button>
                    </div>
                </div>
            </div>
        </section>
        {{-- </div> --}}

    </main>
@endsection
