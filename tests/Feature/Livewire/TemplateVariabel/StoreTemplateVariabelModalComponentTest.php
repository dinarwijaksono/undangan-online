<?php

namespace Tests\Feature\Livewire\TemplateVariabel;

use App\Livewire\TemplateVariabel\ListTemplateVariabelComponent;
use App\Livewire\TemplateVariabel\StoreTemplateVariabelModalComponent;
use App\Models\Template;
use Database\Seeders\CreateTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class StoreTemplateVariabelModalComponentTest extends TestCase
{
    public $template;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateTemplateSeeder::class);
        $this->template = Template::first();
    }

    public function test_renders_successfully()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->assertStatus(200);
    }

    public function test_save_function_saves_data_and_resets_form()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->set('name', 'contoh name')
            ->set('type', 'text')
            ->set('defaultValue', 'contoh')
            ->call('save')
            ->assertHasNoErrors()
            ->assertDispatched('do-close')
            ->assertDispatched('show-alert-create-variabel-success');

        $this->assertDatabaseHas('template_variabels', [
            'name' => 'contoh name',
            'type' => 'text',
            'default_value' => 'contoh',
            'template_id' => $this->template->id,
        ]);
    }

    public function test_modal_opens_and_closes_correctly()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->call('setClose')
            ->assertSet('isOpen', false)
            ->call('setOpen')
            ->assertSet('isOpen', true);
    }

    public function test_validation_errors_are_triggered()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->set('name', '') // required
            ->set('type', '') // required
            ->call('save')
            ->assertHasErrors(['name', 'type']);
    }

    public function test_type_field_accepts_only_valid_values()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->set('name', 'Nama')
            ->set('type', 'invalid_type')
            ->call('save')
            ->assertHasErrors(['type' => 'in']);
    }

    public function test_default_value_is_nullable()
    {
        Livewire::test(StoreTemplateVariabelModalComponent::class, ['templateId' => $this->template->id])
            ->set('name', 'Nama')
            ->set('type', 'text')
            ->set('defaultValue', '')
            ->call('save')
            ->assertHasNoErrors(['defaultValue']);
    }
}
