@extends('layout.main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Edit Undangan</h1>

        <section class="py-4 px-8 bg-base-100 rounded mb-4 shadow">
            <fieldset class="fieldset">
                <legend class="fieldset-legend">Slug</legend>
                <label class="input input-sm w-full">
                    <span class="label">https://momen-indah.com/</span>
                    <input type="text" placeholder="URL" />
                </label>
            </fieldset>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Tanggal acara</legend>
                <input type="date" class="input input-sm w-full" />
            </fieldset>

            <div class="flex mt-8 justify-end gap-2">
                <button class="btn btn-warning text-white btn-sm">Preview</button>
                <button class="btn btn-primary btn-sm w-2/12">Simpan</button>
            </div>
        </section>

        <section class="py-4 px-8 bg-base-100 rounded mb-4 shadow">
            <h2 class="text-xl">Variabel</h2>

            <table class="table mb-4">
                <tbody>
                    <tr class="border-b border-slate-300">
                        <td class="w-5/12">Nama Calon pria</td>
                        <td class="w-2/12">:</td>
                        <td class="w-5/12">
                            <input type="text" class="input input-sm w-full" placeholder="isi ...">
                        </td>
                    </tr>

                    <tr class="border-b border-slate-300">
                        <td class="w-5/12">Nama Calon pria</td>
                        <td class="w-2/12">:</td>
                        <td class="w-5/12">
                            <input type="text" class="input input-sm w-full" placeholder="isi ...">
                        </td>
                    </tr>

                    <tr class="border-b border-slate-300">
                        <td class="w-5/12">Nama Calon pria</td>
                        <td class="w-2/12">:</td>
                        <td class="w-5/12">
                            <input type="text" class="input input-sm w-full" placeholder="isi ...">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end">
                <button class="btn w-2/12 btn-sm btn-primary">Simpan</button>
            </div>

        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-xl mb-5">img asset</h2>
            </div>

            <div class="grid grid-cols-4 gap-2">
                <div class="flex items-center bg-slate-200 rounded h-80 p-2 shadow-xl">
                    <div class="flex justify-center w-full">
                        <button class="btn btn-sm btn-primary">Tambah asset</button>
                    </div>
                </div>

                <div class="flex items-end bg-slate-200 rounded h-80 p-2 shadow-xl">
                    <div class="flex justify-around w-full">
                        <button class="btn btn-sm btn-error text-white">Hapus</button>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
