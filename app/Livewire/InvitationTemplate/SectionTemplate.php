<?php

namespace App\Livewire\InvitationTemplate;

use Livewire\Component;

class SectionTemplate extends Component
{
    protected $themeService;

    public $code;
    public $template;

    public function mount()
    {
        $this->template = app()->make(\App\Services\ThemeService::class);

        $this->template = $this->template->findByCode($this->code);

        if (!$this->template) {
            return redirect('invitation-template');
        }
    }

    public function render()
    {
        return view('livewire.invitation-template.section-template');
    }
}
