<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\ListAssetCoverSection;
use App\Models\Template;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListAssetCoverSectionTest extends TestCase
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
        Livewire::test(ListAssetCoverSection::class, ['code' => $this->template->code])
            ->assertStatus(200);
    }
}
