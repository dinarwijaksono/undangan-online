@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Buat Undangan</h1>

        <section class="py-4 px-8 bg-base-100 rounded">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama kamu</legend>
                <input type="text" class="input input-sm w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Nama pasanganmu</legend>
                <input type="text" class="input input-sm w-full" placeholder="Type here" />
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Slug</legend>
                <label class="input input-sm w-full">
                    <span class="label">https://momen-indah.com/</span>
                    <input type="text" placeholder="URL" />
                </label>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tanggal menikah</legend>
                <input type="date" class="input input-sm w-full" />
            </fieldset>

            <div class="flex mt-8 justify-end gap-2">
                <a href="/invitation/my-invitation" class="btn w-2/12 btn-error btn-sm text-white">Batal</a>

                <button class="btn w-2/12 btn-primary btn-sm ">Simpan</button>
            </div>

        </section>

    </main>
@endsection
