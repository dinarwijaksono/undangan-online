<?php

namespace Tests\Feature\Livewire\InvitationTemplate;

use App\Livewire\InvitationTemplate\ListVariabel;
use App\Models\Theme;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListVariabelTest extends TestCase
{
    protected $theme;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateThemeSeeder::class);
        $this->theme = Theme::first();
    }

    public function test_renders_successfully()
    {
        Livewire::test(ListVariabel::class, ['code' => $this->theme->code])
            ->assertStatus(200);
    }

    public function test_open_create_variabel_modal_dispatches_event()
    {
        Livewire::test(ListVariabel::class, ['code' => $this->theme->code])
            ->call('openCreateVariabelModal')
            ->assertDispatchedTo('invitation-template.create-variabel-modal', 'open-modal');
    }
}
