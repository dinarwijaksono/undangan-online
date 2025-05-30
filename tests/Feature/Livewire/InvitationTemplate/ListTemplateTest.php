<?php

namespace Tests\Feature\Livewire\InvitationTemplate;

use App\Livewire\InvitationTemplate\ListTemplate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListTemplateTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(ListTemplate::class)
            ->assertStatus(200);
    }

    public function test_click_open_modal_create_theme()
    {
        Livewire::test(ListTemplate::class)
            ->call('openModalCreateTheme')
            ->assertDispatchedTo('components.create-theme-modal-form', 'open-modal');
    }
}
