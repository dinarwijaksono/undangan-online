<?php

namespace App\Services;

use App\Models\Theme;
use App\Repositories\ThemeRepository;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ThemeService
{
    protected $themeRepository;

    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }

    public function createTheme(string $name, string $filename): ?Theme
    {
        try {
            $code = Str::random(20);
            $theme = $this->themeRepository->create($code, $name, $filename);

            if (!$theme) {
                throw new \Exception('Theme creation failed');
            }

            Log::info('create theme successfully', [
                'code' => $code,
                'name' => $name,
                'filename' => $filename,
            ]);

            return $theme;
        } catch (\Exception $e) {
            throw new \Exception('Failed to create theme: ' . $e->getMessage());
        }
    }
}
