<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $active = 'dashboard';

    public function boot()
    {
        $path = explode('/', $_SERVER['REQUEST_URI']);

        $this->active = $path[1] ?? 'main';
    }

    public function render()
    {
        return view('livewire.components.sidebar');
    }
}
