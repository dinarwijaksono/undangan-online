<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AlertSuccess extends Component
{
    public $isOpen = false;
    public $message = '';

    public function getListeners()
    {
        return [
            'open-alert' => 'setOpen',
            'close-alert' => 'setClose',
        ];
    }

    public function setOpen(string $message)
    {
        $this->isOpen = true;
        $this->message = $message;
    }

    public function setClose()
    {
        $this->isOpen = false;
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.components.alert-success');
    }
}
