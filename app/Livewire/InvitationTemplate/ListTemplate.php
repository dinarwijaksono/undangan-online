<?php

namespace App\Livewire\InvitationTemplate;

use Livewire\Component;

class ListTemplate extends Component
{
    public $template;

    public function boot()
    {
        self::getTemplates();
    }

    public function getTemplates()
    {
        $t = glob("templates/*");

        $tem = [];

        for ($i = 0; $i < count($t); $i++) {
            $tem[] = trim(str_replace(["templates/", ".html"], ["", ""], $t[$i]));
        }

        $this->template = $tem;
    }

    public function render()
    {
        return view('livewire.invitation-template.list-template');
    }
}
