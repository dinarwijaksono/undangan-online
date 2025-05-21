<?php

namespace App\Services;

use App\Models\User;
use App\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // create
    public function register(string $name, string $email, string $password): ?User
    {
        try {

            $user = $this->userRepository->createUser($name, $email, $password);

            Log::info('register success', [
                'user_id' => $user->id
            ]);

            return $user;
        } catch (\Exception $e) {
            // Log the exception or handle it as needed
            Log::error('register error: ' . $e->getMessage());
            return null;
        }
    }

    // read
    public function login(string $email, string $password): ?User
    {
        try {
            $user = $this->userRepository->findByEmail($email);

            if (!$user || !password_verify($password, $user->password)) {
                Log::warning('login failed', [
                    'email' => $email
                ]);
                return null;
            }

            Auth::login($user);

            Log::info('login success', [
                'user_id' => $user->id
            ]);

            return $user;
        } catch (\Exception $e) {
            Log::error('login error: ' . $e->getMessage(), [
                'email' => $email
            ]);
            return null;
        }
    }
}
