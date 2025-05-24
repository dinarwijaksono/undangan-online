<section class="mb-5 overflow-x-auto p-4 rounded-lg bg-base-100">
    <h1 class="mb-5 text-2xl">Template</h1>

    <table class="table table-zebra mb-4">
        <tbody>
            <tr>
                <td class="w-3/12">Nama Template</td>
                <td class="w-1/12">:</td>
                <td class="w-8/12">{{ $template->name }}</td>
            </tr>

            <tr>
                <td>Dibuat</td>
                <td>:</td>
                <td>{{ date('j M Y', strtotime($template->created_at)) }}</td>
            </tr>

        </tbody>
    </table>

    <div class="flex justify-end">
        <div class="basis-2/12">
            <button class="btn btn-secondary w-full btn-sm">Preview</button>
        </div>
    </div>
</section>
