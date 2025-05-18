<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    protected $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = app()->make(UserService::class);
    }

    public function test_register_success(): void
    {
        $user = $this->userService->register('John Doe', 'john@example.com', 'password123');

        $this->assertNotNull($user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_register_email_already_registered(): void
    {
        // Create a user with the same email
        User::create([
            'name' => 'Existing User',
            'email' => 'john@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Attempt to register with the same email
        $user = $this->userService->register('John Doe', 'john@example.com', 'password123');

        // Assert that the registration fails and no user is returned
        $this->assertNull($user);
    }
}
