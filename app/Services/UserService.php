<?php

namespace App\Services;

use App\Models\User;
use App\RepositoryInterface\UserRepositoryInterface;
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
}
