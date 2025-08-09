<div @class([
    'flex items-center justify-center bg-slate-500/55',
    'hidden' => !$isOpen,
    'fixed z-50 left-0 top-0 right-0 bottom-0' => $isOpen,
])>
    <section class="mb-5 p-6 rounded-lg bg-base-100  border border-slate-300 shadow-lg w-8/12">
        <div>
            <h3 class="text-lg font-bold mb-5">Buat Variabel</h3>

            <fieldset class="fieldset mb-4">
                <legend class="fieldset-legend">Nama tema</legend>
                <input type="text" wire:model="name" class="input input-sm w-full" placeholder="My awesome page" />
                @error('name')
                    <p class="label text-error italic">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset class="fieldset mb-4">
                <legend class="fieldset-legend">Type</legend>
                <select wire:model="type" id="type" class="select select-sm w-full">
                    <option value="text">--pilih--</option>
                    <option value="text">Text</option>
                    <option value="date">Date</option>
                </select>
                @error('type')
                    <p class="label text-error italic">{{ $message }}</p>
                @enderror
            </fieldset>

            <fieldset class="fieldset mb-4">
                <legend class="fieldset-legend">Default value</legend>
                <input type="text" wire:model="defaultValue" class="input input-sm w-full"
                    placeholder="My awesome page" />
                @error('defaultValue')
                    <p class="label text-error italic">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="mb-4 flex justify-end gap-2">
                <button type="button" wire:click="setClose"
                    class="btn btn-error text-white btn-sm w-2/12">Batal</button>

                <button type="button" wire:click="save" class="btn btn-primary btn-sm w-2/12">Simpan</button>
            </div>
        </div>
    </section>

    <script src="/assets/sweetalert/sweetalert.js"></script>
    <script>
        window.addEventListener('show-alert-create-variabel-success', event => {
            Swal.fire({
                title: 'Berhasil',
                text: "Variabel berhasil dibuat",
                icon: 'success'
            })
        })
    </script>
</div>
