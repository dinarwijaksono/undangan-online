<?php

namespace App\Livewire\Auth;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    protected $userService;

    public function boot()
    {
        $this->userService = app()->make(UserService::class);
    }

    public function getRules()
    {
        return (new LoginRequest())->rules();
    }

    public function login()
    {
        $this->validate($this->getRules());

        $login = $this->userService->login($this->email, $this->password);

        if ($login) {
            return redirect()->to('/main');
        } else {
            $this->addError('general', "Email atau password salah.");
        }

        $this->password = '';
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
