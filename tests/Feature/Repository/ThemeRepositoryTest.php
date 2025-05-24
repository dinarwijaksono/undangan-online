<?php

namespace Tests\Feature\Repository;

use App\Models\Theme;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThemeRepositoryTest extends TestCase
{
    protected $themeRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->themeRepository = app(\App\RepositoryInterface\ThemeRepositoryInterface::class);
    }

    public function test_create_theme_successfully()
    {
        $code = 'theme001';
        $name = 'Elegant Theme';
        $filename = 'elegant.html';

        $theme = $this->themeRepository->create($code, $name, $filename);

        $this->assertNotNull($theme);
        $this->assertEquals($code, $theme->code);
        $this->assertEquals($name, $theme->name);
        $this->assertEquals(false, $theme->is_publised);
        $this->assertEquals($filename, $theme->filename);

        $this->assertDatabaseHas('themes', [
            'code' => $code,
            'name' => $name,
            'filename' => $filename,
        ]);
    }

    public function test_get_all_themes_returns_collection()
    {
        // Arrange: create some themes
        $this->seed(CreateThemeSeeder::class);
        $this->seed(CreateThemeSeeder::class);
        $this->seed(CreateThemeSeeder::class);


        $themes = $this->themeRepository->getAll();

        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $themes);
        $this->assertNotNull($themes);
        $this->assertCount(3, $themes);
    }

    public function test_get_all_themes_returns_empty_when_none_exist()
    {
        $themes = $this->themeRepository->getAll();

        $this->assertTrue($themes->isEmpty());
        $this->assertCount(0, $themes);
    }

    public function test_find_by_code_returns_theme_when_exists()
    {
        $code = 'theme002';
        $name = 'Modern Theme';
        $filename = 'modern.html';

        $createdTheme = $this->themeRepository->create($code, $name, $filename);

        $foundTheme = $this->themeRepository->findByCode($code);

        $this->assertNotNull($foundTheme);
        $this->assertEquals($createdTheme->id, $foundTheme->id);
        $this->assertEquals($code, $foundTheme->code);
        $this->assertEquals($name, $foundTheme->name);
        $this->assertEquals($filename, $foundTheme->filename);
    }

    public function test_find_by_code_returns_null_when_not_exists()
    {
        $notExistingCode = 'nonexistent_code';

        $theme = $this->themeRepository->findByCode($notExistingCode);

        $this->assertNull($theme);
    }
}
