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
}
