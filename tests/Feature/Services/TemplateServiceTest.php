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
}
