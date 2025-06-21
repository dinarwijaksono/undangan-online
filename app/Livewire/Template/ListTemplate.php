<?php

namespace App\Livewire\Template;

use App\Services\TemplateService;
use Livewire\Component;

class ListTemplate extends Component
{
    protected $templateService;

    public $templates;

    public function boot()
    {
        $this->templateService = app()->make(TemplateService::class);

        $this->templates = $this->templateService->getAll();
    }

    public function getListeners()
    {
        return [
            'do-refresh' => 'render'
        ];
    }

    public function render()
    {
        return view('livewire.template.list-template');
    }
}
