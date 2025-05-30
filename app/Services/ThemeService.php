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

            Log::error('create theme failed', [
                'code' => $code,
                'name' => $name,
                'filename' => $filename,
            ]);

            throw new \Exception('Failed to create theme: ' . $e->getMessage());
        }
    }

    public function getAll(): ?\Illuminate\Database\Eloquent\Collection
    {
        try {
            $themes = $this->themeRepository->getAll();

            Log::info('Retrieved all themes', [
                'count' => $themes->count(),
            ]);

            return $themes;
        } catch (\Exception $e) {

            Log::error('Failed to retrieve themes', [
                'error' => $e->getMessage(),
            ]);

            throw new \Exception('Failed to retrieve themes: ' . $e->getMessage());
        }
    }

    public function findByCode(string $code): ?Theme
    {
        try {
            $theme = $this->themeRepository->findByCode($code);

            if (!$theme) {
                Log::warning('Theme not found', [
                    'code' => $code,
                ]);
                return null;
            }

            Log::info('Theme found', [
                'code' => $code,
                'name' => $theme->name,
            ]);

            return $theme;
        } catch (\Exception $e) {

            Log::error('Failed to find theme by code', [
                'code' => $code,
                'error' => $e->getMessage(),
            ]);

            throw new \Exception('Failed to find theme: ' . $e->getMessage());
        }
    }
}
