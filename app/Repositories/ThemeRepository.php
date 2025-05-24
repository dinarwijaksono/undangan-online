<?php

namespace App\Repositories;

use App\Models\Theme;
use App\RepositoryInterface\ThemeRepositoryInterface;

class ThemeRepository implements ThemeRepositoryInterface
{
    public function create(string $code, string $name, string $filename): ?Theme
    {
        return Theme::create([
            'code' => $code,
            'name' => $name,
            'filename' => $filename
        ]);
    }

    public function getAll(): ?\Illuminate\Database\Eloquent\Collection
    {
        return Theme::get();
    }
}
