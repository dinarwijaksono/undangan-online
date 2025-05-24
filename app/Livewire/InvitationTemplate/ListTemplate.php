<?php

namespace App\Livewire\InvitationTemplate;

use Livewire\Component;

class ListTemplate extends Component
{
    public $templates;

    protected $themeService;

    public function boot()
    {
        $this->themeService = app()->make(\App\Services\ThemeService::class);

        $this->templates = $this->themeService->getAll()->sortByDesc('created_at');
    }

    public function getListeners()
    {
        return [
            'refresh' => 'render'
        ];
    }

    public function openModalCreateTheme()
    {
        $this->dispatch('open-modal')->to('components.create-theme-modal-form');
    }

    public function render()
    {
        return view('livewire.invitation-template.list-template');
    }
}
