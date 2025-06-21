<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Livewire\Template\CreateTemplateModalForm;
use App\Livewire\Template\ListTemplate;
use App\Models\Template;
use App\Models\User;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTemplateModalFormTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);
        $this->user = User::first();
        $this->actingAs($this->user);
    }

    public function test_renders_successfully()
    {
        Livewire::test(CreateTemplateModalForm::class)
            ->assertStatus(200);
    }

    public function test_create_validate_error()
    {
        Livewire::test(CreateTemplateModalForm::class)
            ->set('name', '')
            ->set('file', '')
            ->call('save')
            ->assertHasErrors(['name', 'file']);
    }

    public function test_create_validate_file_error()
    {
        Storage::fake('avatar');

        $file = UploadedFile::fake()->image('avatar.png');

        Livewire::test(CreateTemplateModalForm::class)
            ->set('name', 'contoh-nama-file')
            ->set('file', $file)
            ->call('save')
            ->assertHasErrors(['file']);
    }

    public function test_create_successs()
    {
        Storage::fake('avatar');

        $file = UploadedFile::fake()->image('avatar.html');

        Livewire::test(CreateTemplateModalForm::class)
            ->set('name', 'contoh-nama-file')
            ->set('file', $file)
            ->call('save')
            ->assertDispatched('do-close')
            ->assertDispatchedTo(AlertSuccess::class, 'open-alert', 'Template berhasil disimpan.')
            ->assertDispatchedTo(ListTemplate::class, 'do-refresh');

        $this->assertDatabaseHas('templates', [
            'name' => 'contoh-nama-file'
        ]);

        $fileName = Template::where('name', 'contoh-nama-file')->first()->html_path;
        $this->assertTrue(Storage::disk('public-custom')->exists("html/$fileName"));
    }
}
