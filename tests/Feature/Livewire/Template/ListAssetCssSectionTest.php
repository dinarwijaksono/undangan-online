<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\ListAssetCssSection;
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

class ListAssetCssSectionTest extends TestCase
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
        Livewire::test(ListAssetCssSection::class, ['template' => $this->template])
            ->assertStatus(200);
    }

    public function test_delete_css()
    {
        Storage::disk('public-custom')->put("css/contoh.css", 'contoh');
        Storage::disk('public-custom')->put("css/contoh-2.css", 'contoh');
        $this->assertTrue(Storage::disk('public-custom')->exists("css/contoh.css"));

        $this->template->update([
            'css_path' => json_encode(['contoh.css', 'contoh-2.css'])
        ]);

        Livewire::test(ListAssetCssSection::class, ['template' => $this->template])
            ->call('doDeleteCss', 'contoh.css')
            ->assertDispatched('show-delete-asset-success');

        $this->assertFalse(Storage::disk('public-custom')->exists("css/contoh.css"));
        $this->assertDatabaseHas('templates', [
            'code' => $this->template->code,
            'css_path' => json_encode(['contoh-2.css'])
        ]);
    }
}
