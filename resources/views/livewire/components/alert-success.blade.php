<div role="alert" @class([
    'alert alert-vertical alert-success text-white mb-5 sm:alert-horizontal rounded-xl shadow-lg',
    'hidden' => !$isOpen,
])>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
        class="stroke-info h-6 w-6 shrink-0 text-white">
    </svg>
    <div>
        <h3 class="font-bold">Success!</h3>
        <div class="text-xs">{{ $message }}</div>
    </div>
    <button type="button" wire:click="setClose" class="btn btn-sm btn-primary">Tutup</button>
</div>
