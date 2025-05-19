<?php

namespace Tests\Feature\Livewire\Auth;

use App\Livewire\Auth\RegisterForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterFormTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(RegisterForm::class)
            ->assertStatus(200);
    }

    public function test_register_success()
    {
        Livewire::test(RegisterForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'password123')
            ->set('passwordConfirmation', 'password123')
            ->call('doRegister')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_register_failure()
    {
        Livewire::test(RegisterForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'password123')
            ->set('passwordConfirmation', 'password123')
            ->call('doRegister')
            ->assertHasNoErrors();

        Livewire::test(RegisterForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'password123')
            ->set('passwordConfirmation', 'password123')
            ->call('doRegister')
            ->assertHasErrors(['email']);
    }

    public function test_register_password_confirmation_mismatch()
    {
        Livewire::test(RegisterForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'password123')
            ->set('passwordConfirmation', 'password456')
            ->call('doRegister')
            ->assertHasErrors(['passwordConfirmation' => 'same']);
    }

    public function test_register_password_too_short()
    {
        Livewire::test(RegisterForm::class)
            ->set('name', 'John Doe')
            ->set('email', 'john@example.com')
            ->set('password', 'pass')
            ->set('passwordConfirmation', 'pass')
            ->call('doRegister')
            ->assertHasErrors(['password' => 'min']);
    }
}
