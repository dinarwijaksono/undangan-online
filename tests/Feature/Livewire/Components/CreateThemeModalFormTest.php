<?php

namespace Tests\Feature\Livewire\Components;

use App\Livewire\Components\CreateThemeModalForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateThemeModalFormTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(CreateThemeModalForm::class)
            ->assertStatus(200);
    }

    public function test_set_open_sets_is_open_to_true()
    {
        Livewire::test(CreateThemeModalForm::class)
            ->call('setOpen')
            ->assertSet('isOpen', true);
    }

    public function test_set_close_sets_is_open_to_false()
    {
        Livewire::test(CreateThemeModalForm::class)
            ->set('isOpen', true)
            ->call('setClose')
            ->assertSet('isOpen', false);
    }

    public function test_save_success()
    {
        Livewire::test(CreateThemeModalForm::class)
            ->set('name', 'satu dua tiga')
            ->set('filename', 'satu-dua-tiga.html')
            ->call('save')
            ->assertHasNoErrors(['name', 'filename'])
            ->assertDispatchedTo('invitation-template.list-template', 'refresh')
            ->assertDispatched('close-modal');

        $this->assertDatabaseHas('themes', [
            'name' => 'satu dua tiga',
            'filename' => 'satu-dua-tiga.html'
        ]);
    }

    public function test_save_fails_when_name_and_filename_are_empty()
    {
        Livewire::test(CreateThemeModalForm::class)
            ->set('name', '')
            ->set('filename', '')
            ->call('save')
            ->assertHasErrors(['name', 'filename']);
    }
}
