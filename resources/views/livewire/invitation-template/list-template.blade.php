<div>
    <h1 class="text-3xl mb-5">List template</h1>

    @for ($i = 0; $i < count($template); $i++)
        <section class="mb-4 border p-2 rounded-lg bg-base-100">
            <h1>{{ str_replace('-', ' ', $template[$i]) }}</h1>

            <div class="flex justify-end gap-2">
                <div class="basis-2/12">
                    <a href="#" class="btn btn-info w-full btn-sm">Preview</a>
                </div>

                <div class="basis-2/12">
                    <a href="/invitation-template/set-variabel" class="btn btn-info w-full btn-sm">Atur Variabel</a>
                </div>
            </div>
        </section>
    @endfor
</div>
