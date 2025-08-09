<section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
    <div class="flex justify-end gap-2 mb-8">
        <button type="button" wire:click="showStoreTemplateVariabelModal" class="btn btn-sm btn-primary mr-2">Tambah
            variabel</button>
    </div>

    <table class="table w-full ">
        <tbody>
            @for ($i = 0; $i < 10; $i++)
                <tr class="border-b hover:bg-green-100 border-slate-300">
                    <td class="w-4/12 ">Nama calon pria</td>
                    <td class="w-2/12 ">:</td>
                    <td class="w-4/12 ">Aku</td>
                    <td class="w-2/12 justify-center">
                        <button class="btn btn-xs btn-error w-full text-white mr-2">Hapus</button>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>

</section>
