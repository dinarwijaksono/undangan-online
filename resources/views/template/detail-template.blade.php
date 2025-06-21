@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Detail template</h1>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <table class="table w-full">
                <tbody>
                    <tr>
                        <td class="w-3/12">Nama template</td>
                        <td class="w-1/12 text-center">:</td>
                        <td class="w-8/12">Nama template</td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td class="text-center">:</td>
                        <td>
                            <button class="btn btn-sm btn-primary">Publis</button>
                        </td>
                    </tr>

                    <tr>
                        <td>Dibuat</td>
                        <td class="text-center">:</td>
                        <td>10:11, 10 november 2025</td>
                    </tr>

                    <tr>
                        <td>Diupdate</td>
                        <td class="text-center">:</td>
                        <td>10:11, 10 november 2025</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end gap-2">
                <a href="/template/set-variabel/asldkfj" class="btn btn-sm btn-primary mr-2">Atur variabel</a>
                <a class="btn btn-sm btn-warning mr-2">preview</a>
                <a href="/template" class="btn btn-sm btn-error text-white mr-2">Kembali</a>
            </div>
        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <h2 class="text-xl mb-5">kode html</h2>

            <div class="mb-2">
                <textarea class="bg-slate-200 rounded-sm h-40 w-full p-2">Lorem ipsum, dolor sit amet consectetur adipisicing.</textarea>
            </div>

            <div class="flex justify-end">
                <button class="btn btn-sm btn-warning mr-2">Upload file</button>
                <button class="btn btn-sm btn-primary">simpan perubahan</button>
            </div>
        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-xl mb-5">css asset</h2>

                <button class="btn btn-primary btn-sm">Tambah asset</button>
            </div>

            <section class="flex">
                <div class="border basis-6/12 border-slate-300 p-2">style.css</div>
                <div class="flex justify-end border basis-6/12 border-slate-300 p-2">
                    <button class="btn btn-sm btn-error text-white">Hapus</button>
                </div>
            </section>

            <section class="flex">
                <div class="border basis-6/12 border-slate-300 p-2">style.css</div>
                <div class="flex justify-end border basis-6/12 border-slate-300 p-2">
                    <button class="btn btn-sm btn-error text-white">Hapus</button>
                </div>
            </section>

            <section class="mt-4">
                <textarea class="bg-slate-200 rounded-sm h-20 w-full"></textarea>
            </section>

        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-between">
                <h2 class="text-xl mb-5">Js asset</h2>

                <button class="btn btn-primary btn-sm">Tambah asset</button>
            </div>

            <section class="flex">
                <div class="border basis-6/12 border-slate-300 p-2">logic.js</div>
                <div class="flex justify-end border basis-6/12 border-slate-300 p-2">
                    <button class="btn btn-sm btn-error text-white">Hapus</button>
                </div>
            </section>

            <section class="mt-4">
                <textarea class="bg-slate-200 rounded-sm h-20 w-full"></textarea>
            </section>

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
                        <button class="btn btn-sm btn-primary text-white">Copy link</button>
                        <button class="btn btn-sm btn-error text-white">Hapus</button>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
