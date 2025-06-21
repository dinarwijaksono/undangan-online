@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Atur Variabel</h1>

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
                <a href="/template/detail-template/asldkfj" class="btn btn-sm btn-error text-white mr-2">Kembali</a>
                <a class="btn btn-sm btn-warning mr-2">preview</a>
            </div>
        </section>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <div class="flex justify-end gap-2 mb-8">
                <a class="btn btn-sm btn-primary mr-2">Tambah variabel</a>
            </div>

            <table class="table w-full ">
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr class="border-b hover:bg-green-100 border-slate-300">
                            <td class="w-4/12 ">Nama calon pria</td>
                            <td class="w-2/12 ">:</td>
                            <td class="w-4/12 ">Aku</td>
                            <td class="w-2/12 justify-center">
                                <button class="btn btn-sm btn-error w-full text-white mr-2">Hapus</button>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>


        </section>


    </main>
@endsection
