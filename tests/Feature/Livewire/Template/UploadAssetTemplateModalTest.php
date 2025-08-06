<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Livewire\Template\ListAssetCssSection;
use App\Livewire\Template\UploadAssetTemplateModal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Template;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class UploadAssetTemplateModalTest extends TestCase
{
    public $user;
    public $template;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);
        $this->user = User::first();
        $this->actingAs($this->user);

        $this->seed(CreateTemplateSeeder::class);
        $this->template = Template::first();
    }

    public function test_renders_successfully()
    {
        Livewire::test(UploadAssetTemplateModal::class, ['code' => $this->template->code])
            ->assertStatus(200);
    }

    public function test_save_success()
    {
        Storage::disk('public-custom')->put('css/avatar.css', 'contoh');
        $file = UploadedFile::fake()->image('avatar.css');

        Livewire::test(UploadAssetTemplateModal::class, ['code' => $this->template->code])
            ->set('type', 'css')
            ->set('file', $file)
            ->call('save')
            ->assertDispatched('do-close')
            ->assertDispatched('show-alert-upload-asset-success')
            ->assertDispatchedTo(ListAssetCssSection::class, 'do-refresh');
    }
}
