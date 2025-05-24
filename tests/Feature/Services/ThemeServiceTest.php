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

    public function test_find_by_code_returns_theme_when_exists()
    {
        // Arrange: create a theme
        $name = 'Classic Theme';
        $filename = 'classic.html';
        $theme = $this->themeService->createTheme($name, $filename);

        // Act: find by code
        $foundTheme = $this->themeService->findByCode($theme->code);

        // Assert
        $this->assertNotNull($foundTheme);
        $this->assertEquals($theme->code, $foundTheme->code);
        $this->assertEquals($name, $foundTheme->name);
        $this->assertEquals($filename, $foundTheme->filename);
    }

    public function test_find_by_code_returns_null_when_not_found()
    {
        // Act
        $foundTheme = $this->themeService->findByCode('nonexistentcode12345');

        // Assert
        $this->assertNull($foundTheme);
    }
}
