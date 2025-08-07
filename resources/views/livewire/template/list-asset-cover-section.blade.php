<section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
    <div class="flex justify-between">
        <h2 class="text-xl mb-5">img asset</h2>
    </div>

    <div class="grid grid-cols-4 gap-3">

        <div class="flex items-end bg-slate-200 rounded h-80 p-2 shadow-xl">
            <div class="flex justify-around w-full">
                <button class="btn btn-xs btn-error text-white w-70/100">Hapus</button>
            </div>
        </div>

        <div class="flex items-center bg-slate-200 hover:bg-slate-100 rounded h-80 p-2 shadow-xl">
            <div class="flex justify-center w-full">
                <button type="button" wire:click="doShowModalUploadAsset" class="btn btn-sm btn-primary">Tambah
                    cover</button>
            </div>
        </div>
    </div>
</section>
