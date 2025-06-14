<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Template;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TemplateControllerApiTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->user = User::first();

        Sanctum::actingAs($this->user);
    }

    public function test_create_but_validate_error(): void
    {
        $response = $this->post('/api/template');

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['name']]);
    }

    public function test_create_templatee_success()
    {
        $response = $this->post('/api/template', [
            'name' => 'example name'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['name', 'code']);

        $this->assertDatabaseHas('templates', [
            'name' => 'example name',
            'is_publish' => false
        ]);
    }

    public function test_find_by_code_but_code_template_not_found()
    {
        $response = $this->get("/api/template/alskflkj");

        $response->assertStatus(400);
        $response->assertJsonPath('message.0', 'Template tidak ditemukan.');
    }

    public function test_find_by_code_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $code = $template->code;

        $response = $this->get("/api/template/$code");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'code',
            'name',
            'thumbnail_path',
            'html_path',
            'css_path',
            'js_path',
            'is_publish',
            'created_at',
            'updated_at'
        ]);
    }

    public function test_get_all_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);

        $response = $this->get("/api/template");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['code', 'name', 'thumbnail_path', 'is_publish', 'created_at', 'updated_at']
        ]);
        $response->assertJsonCount(3);
    }

    public function test_delete_failed_validate_error()
    {
        $response = $this->delete("/api/template");

        $response->assertStatus(400);
        $response->assertJsonStructure(['message']);
        $response->assertJsonPath('message.0', 'Template gagal dihapus.');
    }

    public function test_delete_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $response = $this->delete("/api/template", [
            'code' => $template->code
        ]);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('templates', [
            'code' => $template->code
        ]);
    }
}
