<section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
    <div class="flex justify-between">
        <h2 class="text-xl mb-5">css asset</h2>

        <button type="button" wire:click="openModalCreateAsset" class="btn btn-primary btn-sm">Tambah asset</button>
    </div>

    @for ($i = 0; $i < count($asset); $i++)
        <section class="flex border-b border-slate-300">
            <div class="basis-6/12 p-2">{{ $asset[$i] }}</div>
            <div class="flex justify-end basis-6/12  p-2">
                <button class="btn btn-sm btn-error text-white">Hapus</button>
            </div>
        </section>
    @endfor

    <section class="mt-4">
        <textarea class="textarea bg-slate-200 h-20 w-full">{{ $script }}</textarea>
    </section>

</section>
