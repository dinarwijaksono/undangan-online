<div @class([
    'flex items-center justify-center bg-slate-500/55',
    'hidden' => !$isOpen,
    'fixed z-50 left-0 top-0 right-0 bottom-0' => $isOpen,
])>
    <section class="mb-5 p-6 rounded-lg bg-base-100  border border-slate-300 shadow-lg w-8/12">
        <div>
            <h3 class="text-lg font-bold mb-5">Buat Tema</h3>

            <div class="mb-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Nama tema</legend>
                    <input type="text" wire:model="name" class="input input-sm w-full" placeholder="My awesome page" />
                    @error('name')
                        <p class="label text-error italic">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">File template</legend>
                    <select wire:model="filename" class="select select-sm w-full">
                        <option selected>--pilih file--</option>
                        @for ($i = 0; $i < count($file); $i++)
                            <option value="{{ $file[$i] }}">{{ $file[$i] }}</option>
                        @endfor
                    </select>
                    @error('filename')
                        <p class="label text-error italic">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="mb-4 flex justify-end gap-2">
                <div class="basis-2/12">
                    <button type="button" wire:click="setClose"
                        class="btn btn-error text-white btn-sm w-full">Batal</button>
                </div>

                <div class="basis-2/12">
                    <button type="button" wire:click="save" class="btn btn-primary btn-sm w-full">Simpan</button>
                </div>
            </div>
        </div>
    </section>
</div>
