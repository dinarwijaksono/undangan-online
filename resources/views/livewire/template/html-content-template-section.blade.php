<section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
    <h2 class="text-xl mb-5">konten html</h2>

    <div class="mb-2">
        <textarea wire:model="content" class="textarea bg-slate-200 h-40 w-full">{{ $content }}</textarea>
        @error('content')
            <p class="italic text-red-500 text-[14px]">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end">
        <button class="btn btn-sm btn-warning mr-2">Upload file</button>
        <button type="button" wire:click="save" class="btn btn-sm btn-primary w-2/12"
            wire:loading.class.remove="btn-primary" wire:loading.class="btn-secondary">
            <span wire:loading.remove>simpan perubahan</span>
            <span wire:loading class="loading loading-spinner loading-xs"></span>
        </button>
    </div>
</section>
