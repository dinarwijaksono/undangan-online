<?php

namespace App\Livewire\TemplateVariabel;

use Livewire\Component;

class ListTemplateVariabelComponent extends Component
{
    public $templateId;

    protected $templateVariabelService;

    public function boot()
    {
        $this->templateVariabelService = app()->make(\App\Services\TemplateVariabelService::class);
    }

    public function getListeners()
    {
        return [
            'do-refresh' => 'boot'
        ];
    }

    public function showStoreTemplateVariabelModal()
    {
        $this->dispatch('do-open')->to(StoreTemplateVariabelModalComponent::class);
    }

    public function render()
    {
        return view('livewire.template-variabel.list-template-variabel-component');
    }
}
