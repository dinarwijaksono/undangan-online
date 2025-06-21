<?php

namespace App\Livewire\Components;

use App\Livewire\Template\CreateTemplateModalForm;
use Livewire\Component;

class ButtonOpenCreateTemplate extends Component
{
    public function openModalCreate()
    {
        $this->dispatch('do-open')->to(CreateTemplateModalForm::class);
    }

    public function render()
    {
        return view('livewire.components.button-open-create-template');
    }
}
