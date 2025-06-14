<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
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

    public function test_creat_templatee_success()
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
}
