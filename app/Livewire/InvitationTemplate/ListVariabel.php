<?php

namespace App\Livewire\InvitationTemplate;

use Livewire\Component;

class ListVariabel extends Component
{
    public function openCreateVariabelModal()
    {
        $this->dispatch('open-modal')->to('invitation-template.create-variabel-modal');
    }

    public function render()
    {
        return view('livewire.invitation-template.list-variabel');
    }
}
