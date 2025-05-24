<?php

namespace App\RepositoryInterface;

use App\Models\Theme;

interface ThemeRepositoryInterface
{
    public function create(string $code, string $name, string $filename): ?Theme;
}
