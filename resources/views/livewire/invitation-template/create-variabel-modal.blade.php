<div @class([
    'flex items-center justify-center bg-slate-500/55',
    'fixed z-50 left-0 top-0 right-0 bottom-0' => $isOpen,
    'hidden' => !$isOpen,
])>
    <section class="mb-5 overflow-x-auto p-6 rounded-lg bg-base-100  border border-slate-300 shadow-lg w-8/12">
        <div>
            <h3 class="text-lg font-bold mb-5">Tambah Variabel</h3>

            <div class="mb-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Variabel</legend>
                    <input type="text" wire:model="variabelName" class="input w-full" placeholder="My awesome page" />

                    @error('variabelName')
                        <p class="label text-error italic">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Variabel</legend>

                    <select wire:model="variabelType" class="select select-sm w-full">
                        <option selected>--pilih file--</option>
                        <option value="text">text</option>
                        <option value="date">tanggal</option>
                    </select>

                    @error('variabelType')
                        <p class="label text-error italic">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-4 flex justify-end gap-2">
                <div class="basis-2/12">
                    <button wire:click="setClose" class="btn btn-error text-white btn-sm w-full">Batal</button>
                </div>

                <div class="basis-2/12">
                    <button type="button" wire:click="save" class="btn btn-primary btn-sm w-full">Simpan</button>
                </div>
            </div>
        </div>
    </section>
</div>
