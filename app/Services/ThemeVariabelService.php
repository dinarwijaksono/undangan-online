<?php

namespace App\Services;

use App\Models\ThemeVariabel;
use App\RepositoryInterface\ThemeRepositoryInterface;
use App\RepositoryInterface\ThemeVariabelRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ThemeVariabelService
{
    protected $themeRepository;
    protected $themeVariabelRepository;

    public function __construct(
        ThemeRepositoryInterface $themeRepository,
        ThemeVariabelRepositoryInterface $themeVariabelRepository
    ) {
        $this->themeRepository = $themeRepository;
        $this->themeVariabelRepository = $themeVariabelRepository;
    }

    public function create(string $code, string $variabelName, string $variabelType): ?ThemeVariabel
    {
        try {
            $theme = $this->themeRepository->findByCode($code);

            if (!$theme) {
                Log::error('Theme not found', ['code' => $code]);
                throw new \Exception("Theme with code {$code} not found.");
            }

            $themeVariabel = $this->themeVariabelRepository->create(
                $theme->id,
                $variabelName,
                $variabelType
            );

            Log::info('Theme variabel created successfully', [
                'themeId' => $theme->id,
                'variabelName' => $variabelName,
                'variabelType' => $variabelType,
            ]);

            return $themeVariabel;
        } catch (\Throwable $th) {
            Log::error('create theme variabel failed', [
                'code' => $code,
                'variabelName' => $variabelName,
                'variabelType' => $variabelType,
            ]);

            return null;
        }
    }
}
