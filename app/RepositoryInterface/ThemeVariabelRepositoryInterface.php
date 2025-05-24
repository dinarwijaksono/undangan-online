<?php

namespace App\RepositoryInterface;

use App\Models\ThemeVariabel;

interface ThemeVariabelRepositoryInterface
{
    public function create(int $themeId, string $variabelName, string $variabelType): ?ThemeVariabel;
}
