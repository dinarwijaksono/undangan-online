<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\ListTemplate;
use App\Models\User;
use App\Services\TemplateService;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListTemplateTest extends TestCase
{
    public $user;
    protected $templateService;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(CreateUserSeeder::class);
        $this->user = User::first();
        $this->actingAs($this->user);

        $this->templateService = app()->make(TemplateService::class);
    }

    public function test_renders_successfully()
    {
        Livewire::test(ListTemplate::class)
            ->assertStatus(200);
    }

    public function test_renders_with_exist_template()
    {
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);
        $this->seed(CreateTemplateSeeder::class);

        Livewire::test(ListTemplate::class)
            ->assertStatus(200);
    }
}
