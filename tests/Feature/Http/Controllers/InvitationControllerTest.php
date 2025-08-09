<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Template;
use App\Models\Theme;
use App\Models\User;
use Database\Seeders\CreateTemplateSeeder;
use Database\Seeders\CreateThemeSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationControllerTest extends TestCase
{
    public $user;

    public $template;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->user = User::first();

        $this->seed(CreateTemplateSeeder::class);
        $this->template = Template::first();
    }

    public function test_view_set_variabel(): void
    {

        $_SERVER['REQUEST_URI'] = '/invitation-template/set-variabel/' . $this->template->code;
        $response = $this->actingAs($this->user)
            ->get('/template/set-variabel/' . $this->template->code);

        $response->assertStatus(200);
    }
}
