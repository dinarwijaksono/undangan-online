<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Database\Seeders\CreateThemeSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvitationControllerTest extends TestCase
{
    public $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->user = User::first();
    }

    public function test_view_set_variabel(): void
    {
        $this->seed(CreateThemeSeeder::class);
        $template = Theme::first();

        $_SERVER['REQUEST_URI'] = '/invitation-template/set-variabel/' . $template->code;
        $response = $this->actingAs($this->user)
            ->get('/invitation-template/set-variabel/' . $template->code);

        $response->assertStatus(200);
    }
}
