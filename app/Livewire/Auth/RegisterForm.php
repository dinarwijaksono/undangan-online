<?php

namespace App\Livewire\Auth;

use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;

    protected $userService;

    public function boot()
    {
        $this->userService = app()->make(UserService::class);
    }

    public function getRules()
    {
        return (new RegisterRequest())->rules();
    }

    public function doRegister()
    {
        $this->validate();

        $register = $this->userService->register($this->name, $this->email, $this->password);

        if (!$register) {
            $this->addError('email', 'Email sudah terdaftar');

            return;
        }

        session()->flash('registerSuccess', "Akun berhasil terdaftar");

        $this->password = '';
        $this->passwordConfirmation = '';
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
