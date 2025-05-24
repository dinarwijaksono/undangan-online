<?php

namespace Tests\Feature\Livewire\InvitationTemplate;

use App\Livewire\InvitationTemplate\CreateVariabelModal;
use App\Models\Theme;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateVariabelModalTest extends TestCase
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
        Livewire::test(CreateVariabelModal::class, ['code' => $this->theme->code])
            ->assertStatus(200);
    }

    public function test_can_open_modal()
    {
        Livewire::test(CreateVariabelModal::class)
            ->set('code', $this->theme->code)
            ->call('setOpen')
            ->assertSet('isOpen', true);
    }

    public function test_can_close_modal()
    {
        Livewire::test(CreateVariabelModal::class, ['code' => $this->theme->code])
            ->call('setOpen')
            ->call('setClose')
            ->assertSet('isOpen', false);
    }

    public function test_can_save_variabel()
    {
        Livewire::test(CreateVariabelModal::class, ['code' => $this->theme->code])
            ->set('variabelName', 'Nama Variabel')
            ->set('variabelType', 'text')
            ->call('save')
            ->assertDispatched('close-modal')
            ->assertDispatchedTo('components.alert-success', 'open-alert', 'Variabel berhasil disimpan.')
            ->assertSet('variabelName', '')
            ->assertSet('variabelType', '');

        $this->assertDatabaseHas('theme_variabels', [
            'variabel_name' => 'Nama Variabel',
            'variabel_type' => 'text'
        ]);
    }

    public function test_save_requires_validation()
    {
        Livewire::test(CreateVariabelModal::class, ['code' => $this->theme->code])
            ->set('variabelName', '')
            ->set('variabelType', '')
            ->call('save')
            ->assertHasErrors(['variabelName', 'variabelType']);
    }
}
