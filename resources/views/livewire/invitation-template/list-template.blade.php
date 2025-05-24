<div>
    <div class="flex justify-center mb-4">
        <button type="button" wire:click="openModalCreateTheme" class="btn btn-primary btn-sm w-5/12">Buat
            Template</button>
    </div>

    @foreach ($templates as $key)
        <section class="mb-4 border p-2 rounded-lg bg-base-100">
            <h1>{{ $key->name }}</h1>

            <div class="flex justify-end gap-2">
                <div class="basis-2/12">
                    <a href="#" class="btn btn-info w-full btn-sm">Preview</a>
                </div>

                <div class="basis-2/12">
                    <a href="/invitation-template/set-variabel" class="btn btn-info w-full btn-sm">Atur Variabel</a>
                </div>
            </div>
        </section>
    @endforeach
</div>
