<?php

namespace Tests\Feature\Repository;

use App\Models\User;
use App\RepositoryInterface\UserRepositoryInterface;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    public $userRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = app()->make(UserRepositoryInterface::class);
    }

    public function test_create_user_success()
    {
        $name = 'John Doe';
        $email = 'johndoe@example.com';
        $password = 'password123';

        $user = $this->userRepository->createUser($name, $email, $password);

        $this->assertNotNull($user);
        $this->assertEquals($name, $user->name);
        $this->assertEquals($email, $user->email);
        $this->assertTrue(Hash::check($password, $user->password));
        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);
        $this->assertInstanceOf(User::class, $user);
    }

    public function test_create_user_with_existing_email()
    {
        $name = 'Jane Doe';
        $email = 'johndoe@example.com';
        $password = 'password456';

        // Create a user with the same email first
        $this->userRepository->createUser('Existing User', $email, 'password123');

        // Attempt to create another user with the same email
        $this->expectException(\Illuminate\Database\QueryException::class);

        $this->userRepository->createUser($name, $email, $password);
    }

    public function testFindByEmailSuccess()
    {
        // Create a user
        $this->seed(UserSeeder::class);

        $getUser = User::first();

        // Find the user by email
        $user = $this->userRepository->findByEmail($getUser->email);

        $this->assertNotNull($user);
        $this->assertEquals($getUser->email, $user->email);
        $this->assertEquals($getUser->name, $user->name);
        $this->assertInstanceOf(User::class, $user);
    }

    public function testFindByEmailUserNotFound()
    {
        $email = 'nonexistent@example.com';

        // Attempt to find a user by an email that does not exist
        $user = $this->userRepository->findByEmail($email);

        $this->assertNull($user);
    }
}
