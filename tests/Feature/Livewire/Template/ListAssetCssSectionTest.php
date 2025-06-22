<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\ListAssetCssSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Template;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateUserSeeder;
use Livewire\Livewire;
use Tests\TestCase;

class ListAssetCssSectionTest extends TestCase
{
    public $user;
    public $template;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);
        $this->user = User::first();
        $this->actingAs($this->user);

        $this->seed(CreateTemplateSeeder::class);
        $this->template = Template::first();
    }

    public function test_renders_successfully()
    {
        Livewire::test(ListAssetCssSection::class, ['template' => $this->template])
            ->assertStatus(200);
    }
}
