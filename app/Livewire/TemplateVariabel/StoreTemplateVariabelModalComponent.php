<?php

namespace App\Livewire\TemplateVariabel;

use App\Services\TemplateVariabelService;
use Livewire\Component;

class StoreTemplateVariabelModalComponent extends Component
{
    public $isOpen = false;

    public $templateId;
    public $name;
    public $type;
    public $defaultValue;

    public function mounted()
    {
        $this->type = 'text';
    }

    public function getListeners()
    {
        return [
            'do-open' => 'setOpen',
            'do-close' => 'setClose',
        ];
    }

    public function getRules()
    {
        return [
            'name' => 'required|string|max:100',
            'type' => 'required|in:text,date',
            'defaultValue' => 'nullable|max:255',
        ];
    }

    public function setOpen()
    {
        $this->isOpen = true;
    }

    public function setClose()
    {
        $this->isOpen = false;
        $this->reset(['name', 'type', 'defaultValue']);
    }

    public function save(TemplateVariabelService $templateVariabelService)
    {
        $this->validate();

        $templateVariabelService->store($this->templateId, $this->name, $this->type, $this->defaultValue);

        $this->dispatch('do-refresh')->to(ListTemplateVariabelComponent::class);
        $this->dispatch('show-alert-create-variabel-success');
        $this->dispatch('do-close')->self();
    }

    public function render()
    {
        return view('livewire.template-variabel.store-template-variabel-modal-component');
    }
}
