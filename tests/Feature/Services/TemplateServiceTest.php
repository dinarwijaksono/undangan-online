<?php

namespace Tests\Feature\Services;

use App\Models\Template;
use App\Models\User;
use App\Services\TemplateService;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TemplateServiceTest extends TestCase
{
    protected $user;
    protected $templateService;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);
        $this->user = User::first();
        $this->actingAs($this->user);

        $this->templateService = $this->app->make(TemplateService::class);
    }

    public function test_create_success(): void
    {
        $response = $this->templateService->create($this->user, 'template 1', 'contoh-nama.html');

        $this->assertInstanceOf(Template::class, $response);
        $this->assertDatabaseHas('templates', [
            'html_path' => 'contoh-nama.html',
            'name' => 'template 1'
        ]);
    }

    public function test_find_by_code_failed_code_is_empty()
    {
        $response = $this->templateService->findByCode('alsdfkj');

        $this->assertNull($response);
    }

    public function test_find_by_code_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $response = $this->templateService->findByCode($template->code);

        $this->assertInstanceOf(Template::class, $response);
        $this->assertEquals($response->code, $template->code);
    }

    public function test_get_all()
    {
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);

        $response = $this->templateService->getAll();

        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals(3, $response->count());
    }

    public function test_update_content_html_success()
    {
        $fileName = \Illuminate\Support\Str::random(10) . '.html';

        Storage::disk('public-custom')->put("html/$fileName", 'abcd');

        $file = Storage::disk('public-custom')->get("html/$fileName");

        $this->assertEquals('abcd', $file);

        $response = $this->templateService->updateContentHtml($fileName, 'ini kalimat baru');

        $this->assertTrue($response);

        $file = Storage::disk('public-custom')->get("html/$fileName");
        $this->assertEquals('ini kalimat baru', $file);
    }

    public function test_update_content_html_but_file_not_exist()
    {
        $response = $this->templateService->updateContentHtml('file-ini-tidak-ada', 'ini kalimat baru');

        $this->assertFalse($response);
    }

    public function test_update_asset_template_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $this->templateService->updateAssetTemplate($template->code, 'css', 'contoh.css');
        $this->templateService->updateAssetTemplate($template->code, 'js', 'contoh.js');
        $this->templateService->updateAssetTemplate($template->code, 'thumbnail', 'contoh.jpg');
        $this->templateService->updateAssetTemplate($template->code, 'img', 'contoh.jpeg');

        $template = Template::where('code', $template->code)->first();

        $this->assertEquals(json_decode($template->css_path), ['contoh.css']);
        $this->assertEquals(json_decode($template->js_path), ['contoh.js']);
        $this->assertEquals(json_decode($template->thumbnail_path), ['contoh.jpg']);
        $this->assertEquals(json_decode($template->img_path), ['contoh.jpeg']);
    }


    public function test_delete_asset_template_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $this->templateService->updateAssetTemplate($template->code, 'css', 'contoh.css');
        $this->templateService->updateAssetTemplate($template->code, 'js', 'contoh.js');

        $this->templateService->deleteAssetTemplate($template->code, 'css', 'contoh.css');
        $this->templateService->deleteAssetTemplate($template->code, 'js', 'contoh.js');

        $template = Template::where('code', $template->code)->first();
        $this->assertEquals(json_decode($template->css_path), []);
        $this->assertEquals(json_decode($template->js_path), []);
    }
}
