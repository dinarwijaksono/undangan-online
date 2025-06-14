<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthControllerApiTest extends TestCase
{
    public function test_register_but_validate_error(): void
    {
        $response = $this->post('/api/register');

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['name', 'email', 'password', 'passwordConfirmation']]);
    }

    public function test_register_but_email_must_unique()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post('/api/register', [
            'name' => 'john',
            'email' => 'johndoe@example.com',
            'password' => 'john1234',
            'passwordConfirmation' => 'john1234'
        ]);

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['email']]);
        $response->assertJsonPath('errors.email.0', 'Email tidak tersedia.');
    }

    public function test_register_success()
    {
        $response = $this->post('/api/register', [
            'name' => 'john',
            'email' => 'johndoe@example.com',
            'password' => 'john1234',
            'passwordConfirmation' => 'john1234'
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['name', 'email']);
        $response->assertJsonPath('name', 'john');
        $response->assertJsonPath('email', 'johndoe@example.com');

        $this->assertDatabaseHas('users', [
            'name' => 'john',
            'email' => 'johndoe@example.com'
        ]);
    }

    public function test_login_validate_error()
    {
        $response = $this->post('/api/login');

        $response->assertStatus(400);
        $response->assertJsonStructure(['errors' => ['email', 'password']]);
    }

    public function test_login_email_is_not_empty()
    {
        $response = $this->post('/api/login', [
            'email' => 'emailisempty@example.com',
            'password' => 'test1234'
        ]);

        $response->assertStatus(400);
        $response->assertJsonStructure(['general']);
        $response->assertJsonPath('general.0', 'Email atau password salah.');
    }

    public function test_login_password_is_wrong()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post('/api/login', [
            'email' => 'johndoe@example.com',
            'password' => 'passwordiswrong'
        ]);

        $response->assertStatus(400);
        $response->assertJsonStructure(['general']);
        $response->assertJsonPath('general.0', 'Email atau password salah.');
    }

    public function test_login_success()
    {
        $this->seed(UserSeeder::class);

        $response = $this->post('/api/login', [
            'email' => 'johndoe@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }

    public function test_logout()
    {
        $this->seed(UserSeeder::class);
        $user = User::first();

        Sanctum::actingAs($user);

        $response = $this->delete('/api/logout');

        $response->assertStatus(200);
        $response->assertJsonStructure(['message']);
        $response->assertJsonPath('message', 'Berhasil logout.');
    }
}
