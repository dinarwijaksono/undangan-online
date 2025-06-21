<div role="alert" @class([
    'alert alert-vertical alert-success text-white mb-5 sm:alert-horizontal rounded shadow-lg relative',
    'hidden' => !$isOpen,
])>
    <i class="fa-solid fa-circle-check fa-2xl"></i>
    <div>
        <h3 class="font-bold">Success!</h3>
        <div class="text-xs">{{ $message }}</div>
    </div>
    <button type="button" wire:click="setClose" class="absolute top-1 right-1">
        <i class="fa-solid fa-rectangle-xmark text-white fa-xl"></i>
    </button>
</div>
