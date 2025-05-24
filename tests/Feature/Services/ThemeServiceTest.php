<?php

namespace Tests\Feature\Services;

use Database\Seeders\CreateThemeSeeder;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThemeServiceTest extends TestCase
{
    protected $themeService;

    public function setUp(): void
    {
        parent::setUp();
        $this->themeService = app(\App\Services\ThemeService::class);
    }

    public function test_create_theme_successfully()
    {
        $name = 'Elegant Theme';
        $filename = 'elegant.html';

        $theme = $this->themeService->createTheme($name, $filename);

        $this->assertNotNull($theme);
        $this->assertEquals($name, $theme->name);
        $this->assertEquals(false, $theme->is_publised);
        $this->assertEquals($filename, $theme->filename);

        $this->assertDatabaseHas('themes', [
            'name' => $name,
            'filename' => $filename,
        ]);
    }

    public function test_get_all_themes_returns_collection()
    {
        $this->seed(CreateThemeSeeder::class);
        $this->seed(CreateThemeSeeder::class);

        $themes = $this->themeService->getAll();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $themes);
        $this->assertGreaterThanOrEqual(2, $themes->count());
    }
}
