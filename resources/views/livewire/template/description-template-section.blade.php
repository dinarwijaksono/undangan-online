<section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
    <table class="table w-full">
        <tbody>
            <tr>
                <td class="w-3/12">Nama template</td>
                <td class="w-1/12 text-center">:</td>
                <td class="w-8/12">{{ $template->name }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td class="text-center">:</td>
                <td>
                    <div @class([
                        'badge badge-sm',
                        'badge-secondary' => !$template->is_publish,
                        'badge-warning' => $template->is_publish,
                    ])>{{ $template->is_publish ? 'Public' : 'Private' }}</div>
                </td>
            </tr>

            <tr>
                <td>Dibuat</td>
                <td class="text-center">:</td>
                <td>{{ date('H:I, j F Y', strtotime($template->created_at)) }}</td>
            </tr>

            <tr>
                <td>Diupdate</td>
                <td class="text-center">:</td>
                <td>{{ date('H:I, j F Y', strtotime($template->updated_at)) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="flex justify-end gap-2">
        <a href="/template/set-variabel/{{ $template->code }}" class="btn btn-sm btn-primary mr-2">Atur variabel</a>
        <a href="/template/preview/{{ $template->code }}" target="_blank"
            class="btn btn-sm btn-warning mr-2">preview</a>
    </div>
</section>
