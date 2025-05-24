<?php

namespace Tests\Feature\Services;

use App\Models\Theme;
use App\Models\ThemeVariabel;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThemeVariabelServiceTest extends TestCase
{
    protected $themeVariabelService;

    public function setUp(): void
    {
        parent::setUp();

        $this->themeVariabelService = app()->make(\App\Services\ThemeVariabelService::class);
    }

    public function test_create_theme_variabel_success()
    {
        $this->seed(CreateThemeSeeder::class);
        $theme = Theme::first();

        $variabelName = 'background_color';
        $variabelType = 'text';

        $themeVariabel = $this->themeVariabelService->create(
            $theme->code,
            $variabelName,
            $variabelType
        );

        $this->assertInstanceOf(ThemeVariabel::class, $themeVariabel);
        $this->assertNotNull($themeVariabel);
        $this->assertEquals($theme->id, $themeVariabel->theme_id);
        $this->assertEquals($variabelName, $themeVariabel->variabel_name);
        $this->assertEquals($variabelType, $themeVariabel->variabel_type);

        // Pastikan data benar-benar tersimpan di database
        $this->assertDatabaseHas('theme_variabels', [
            'theme_id' => $theme->id,
            'variabel_name' => $variabelName,
            'variabel_type' => $variabelType,
        ]);
    }

    public function test_create_theme_variabel_theme_not_found()
    {
        $themeCode = 'not-exist-code';
        $variabelName = 'font_size';
        $variabelType = 'integer';

        $themeVariabel = $this->themeVariabelService->create(
            $themeCode,
            $variabelName,
            $variabelType
        );

        $this->assertNull($themeVariabel);

        // Pastikan tidak ada data yang masuk ke database
        $this->assertDatabaseMissing('theme_variabels', [
            'variabel_name' => $variabelName,
            'variabel_type' => $variabelType,
        ]);
    }
}
