<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\AlertSuccess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AlertSuccessTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(AlertSuccess::class)
            ->assertStatus(200);
    }

    public function test_can_open_alert()
    {
        Livewire::test(AlertSuccess::class)
            ->call('setOpen', 'Test message')
            ->assertSet('isOpen', true)
            ->assertSet('message', 'Test message');
    }
    public function test_can_close_alert()
    {
        Livewire::test(AlertSuccess::class)
            ->call('setOpen', 'Test message')
            ->call('setClose')
            ->assertSet('isOpen', false)
            ->assertSet('message', '');
    }
    public function test_alert_is_not_open_by_default()
    {
        Livewire::test(AlertSuccess::class)
            ->assertSet('isOpen', false)
            ->assertSet('message', '');
    }
}
