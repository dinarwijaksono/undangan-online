<div @class([
    'hidden' => !$isOpen,
    'flex justify-center items-center fixed z-50 top-0 right-0 left-0 bottom-0 bg-slate-500/55',
])>

    <section class="mb-5 p-6 rounded-lg bg-base-100 border border-slate-300 shadow-lg w-7/12">
        <h1 class="text-xl text-center font-bold">Tambah asset</h1>

        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">Type</legend>
            <select wire:model="type" class="select select-sm w-full">
                <option selected>--Pilih--</option>
                <option value="css">css</option>
                <option value="js">js</option>
            </select>
            @error('type')
                <p class="label text-error italic">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset mb-4">
            <legend class="fieldset-legend">File</legend>
            <input type="file" wire:model="file" class="file-input file-input-sm w-full" />
            @error('file')
                <p class="label text-error italic">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="mb-4 flex justify-end gap-2">
            <button type="button" wire:click="setClose" class="btn btn-error text-white btn-sm w-2/12">Batal</button>

            <button type="button" wire:click="save" class="btn btn-primary btn-sm w-2/12">Simpan</button>
        </div>
    </section>

    <script src="/assets/sweetalert/sweetalert.js"></script>
    <script>
        window.addEventListener('show-alert-upload-asset-success', event => {
            Swal.fire({
                title: 'Berhasil',
                text: "Asset berhasil diupload.",
                icon: 'success',
            })
        })
    </script>
</div>
