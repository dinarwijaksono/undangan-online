<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Template;
use App\Models\TemplateVariabel;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateTemplateVariabelSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TemplateVariabelControllerApiTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->user = User::first();

        Sanctum::actingAs($this->user);
    }

    public function test_create_failed_validate(): void
    {
        $response = $this->post('/api/template/variabel');

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['template_id', 'name']]);
    }

    public function test_create_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $response = $this->post('/api/template/variabel', [
            'template_id' => $template->id,
            'name' => 'nama calon pria',
            'type' => 'text',
            'default_value' => 'aku'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $response->assertJsonPath('message.0', 'Variabel berhasil disimpan.');

        $this->assertDatabaseHas('template_variabels', [
            'template_id' => $template->id,
            'name' => 'nama calon pria',
            'type' => 'text',
            'default_value' => 'aku'
        ]);
    }

    public function test_create_but_not_complate()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $response = $this->post('/api/template/variabel', [
            'template_id' => $template->id,
            'name' => 'nama calon pria',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $response->assertJsonPath('message.0', 'Variabel berhasil disimpan.');

        $this->assertDatabaseHas('template_variabels', [
            'template_id' => $template->id,
            'name' => 'nama calon pria',
            'type' => 'text',
            'default_value' => null
        ]);
    }

    public function test_get_all_but_template_not_exist()
    {
        $response = $this->get('/api/template/variabel/sfdfsdf', [
            'template_id' => 101,
        ]);

        $response->assertStatus(400);
        $response->assertJsonStructure(['message', 'errors' => ['template']]);
        $response->assertJsonPath('message', 'Template tidak ditemukan.');
    }

    public function test_get_all_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $template = Template::first();

        $this->seed(CreateTemplateVariabelSeeder::class);

        $response = $this->get("/api/template/variabel/$template->code", [
            'code' => $template->code,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            ['id', 'template_id', 'name', 'default_value', 'created_at']
        ]);
    }

    public function test_delete_failed_validate_error()
    {
        $response = $this->delete('/api/template/variabel');

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['id']]);
    }

    public function test_delete_success()
    {
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateVariabelSeeder::class);

        $variabel = TemplateVariabel::first();

        $response = $this->delete('/api/template/variabel', [
            'id' => $variabel->id
        ]);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('template_variabels', [
            'id' => $variabel->id,
            'name' => $variabel->name
        ]);
    }
}
