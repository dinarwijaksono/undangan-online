<?php

namespace Tests\Feature\Repository;

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
}
