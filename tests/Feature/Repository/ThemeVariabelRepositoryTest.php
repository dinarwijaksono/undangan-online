<?php

namespace Tests\Feature\Repository;

use App\Models\Theme;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThemeVariabelRepositoryTest extends TestCase
{
    public $themeVariabelRepository;

    public $theme;

    public function setUp(): void
    {
        parent::setUp();
        $this->themeVariabelRepository = app()->make(\App\RepositoryInterface\ThemeVariabelRepositoryInterface::class);

        $this->seed(CreateThemeSeeder::class);
        $this->theme = Theme::first();
    }

    public function test_create_theme_variabel_successfully()
    {
        $variabelName = 'background_color';
        $variabelType = 'text';

        $themeVariabel = $this->themeVariabelRepository->create(
            $this->theme->id,
            $variabelName,
            $variabelType
        );

        $this->assertNotNull($themeVariabel);
        $this->assertEquals($this->theme->id, $themeVariabel->theme_id);
        $this->assertEquals($variabelName, $themeVariabel->variabel_name);
        $this->assertEquals($variabelType, $themeVariabel->variabel_type);
        $this->assertDatabaseHas('theme_variabels', [
            'theme_id' => $this->theme->id,
            'variabel_name' => $variabelName,
            'variabel_type' => $variabelType,
        ]);
    }
}
