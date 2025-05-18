<?php

namespace App\Repositories;

use App\Models\User;
use App\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(string $name, string $email, string $password): ?User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
