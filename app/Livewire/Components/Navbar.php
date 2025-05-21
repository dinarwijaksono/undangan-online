<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}
