<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\Navbar;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NavbarTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(Navbar::class)
            ->assertStatus(200);
    }

    public function test_logout_redirects_to_login()
    {
        $this->seed(UserSeeder::class);
        $user = User::first();
        $this->actingAs($user);

        Livewire::test(Navbar::class)
            ->call('logout')
            ->assertRedirect('/login');
    }
}
