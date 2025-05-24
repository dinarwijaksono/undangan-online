<?php

namespace App\Repositories;

use App\Models\ThemeVariabel;
use App\RepositoryInterface\ThemeVariabelRepositoryInterface;

class ThemeVariabelRepository implements ThemeVariabelRepositoryInterface
{
    public function create(int $themeId, string $variabelName, string $variabelType): ?ThemeVariabel
    {
        return ThemeVariabel::create([
            'theme_id' => $themeId,
            'variabel_name' => $variabelName,
            'variabel_type' => $variabelType,
        ]);
    }
}
