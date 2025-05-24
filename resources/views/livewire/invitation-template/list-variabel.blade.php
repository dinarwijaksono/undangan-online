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
            <button type="button" wire:click="openCreateVariabelModal" class="btn btn-info w-full btn-sm">Tambah
                Variabel</button>
        </div>
    </div>
</section>
