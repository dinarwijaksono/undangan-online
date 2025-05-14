@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Buat Undangan</h1>

        <section class="py-4 px-8 bg-base-100 rounded">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama kamu</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama pasanganmu</legend>
                <input type="text" class="input w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tanggal menikah</legend>
                <input type="date" class="input w-full" />
            </fieldset>

            <div class="flex mt-8 justify-end gap-2">
                <div class="basis-2/12">
                    <button class="btn btn-error text-white w-full">Batal</button>
                </div>

                <div class="basis-2/12">
                    <button class="btn btn-primary w-full">Simpan</button>
                </div>
            </div>

        </section>

    </main>
@endsection
