@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Edit Undangan</h1>

        <section class="py-4 px-8 bg-base-100 rounded">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Name</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">endpoint</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tanggal undangan</legend>
                <input type="date" class="input w-full" />
            </fieldset>

            <div class="divider"></div>

            <h2 class="mb-5 mt-5 font-bold">Variabel</h2>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama calon suami</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama calon istri</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <div class="flex mt-8 justify-end gap-2">
                <div class="basis-2/12">
                    <button class="btn btn-primary btn-sm w-full">Simpan</button>
                </div>
            </div>

        </section>

    </main>
@endsection
