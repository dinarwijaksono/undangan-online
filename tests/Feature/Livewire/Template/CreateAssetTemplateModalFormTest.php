<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Components\AlertSuccess;
use App\Livewire\Template\CreateAssetTemplateModalForm;
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

class CreateAssetTemplateModalFormTest extends TestCase
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
        Livewire::test(CreateAssetTemplateModalForm::class, ['code' => $this->template->code])
            ->assertStatus(200);
    }

    public function test_create_asset_template()
    {
        Storage::fake('avatar');
        $file = UploadedFile::fake()->image('avatar.css');

        Livewire::test(CreateAssetTemplateModalForm::class, ['code' => $this->template->code])
            ->set('type', 'css')
            ->set('file', $file)
            ->call('save')
            ->assertDispatchedTo(AlertSuccess::class, 'open-alert', 'Asset berhasil ditambahkan.')
            ->assertDispatched('do-close');
    }
}
