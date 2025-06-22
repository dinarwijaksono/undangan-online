<?php

namespace App\Livewire\Template;

use Livewire\Component;

class DescriptionTemplateSection extends Component
{
    public $template;

    public function render()
    {
        return view('livewire.template.description-template-section');
    }
}
