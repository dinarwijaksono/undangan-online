<?php

namespace App\RepositoryInterface;

use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(string $name, string $email, string $password): ?User;

    public function findByEmail(string $email): ?User;
}
