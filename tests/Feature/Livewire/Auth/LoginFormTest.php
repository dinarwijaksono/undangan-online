<?php

namespace Tests\Feature\Livewire\Auth;

use App\Livewire\Auth\LoginForm;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginFormTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(LoginForm::class)
            ->assertStatus(200);
    }

    public function test_login_with_valid_credentials()
    {
        $this->seed(UserSeeder::class);
        $user = User::first();

        Livewire::test(LoginForm::class)
            ->set('email', $user->email)
            ->set('password', 'password123')
            ->call('login')
            ->assertRedirect('/main')
            ->assertHasNoErrors(['email', 'password', 'general']);
    }

    public function test_login_with_invalid_credentials()
    {
        Livewire::test(LoginForm::class)
            ->set('email', 'wrong@example.com')
            ->set('password', 'wrongpassword')
            ->call('login')
            ->assertHasErrors(['general' => 'Email atau password salah.']);
    }

    public function test_login_with_empty_fields()
    {
        Livewire::test(LoginForm::class)
            ->set('email', '')
            ->set('password', '')
            ->call('login')
            ->assertHasErrors(['email', 'password']);
    }
}
