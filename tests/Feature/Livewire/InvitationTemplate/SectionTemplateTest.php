<?php

namespace Tests\Feature\Livewire\InvitationTemplate;

use App\Livewire\InvitationTemplate\SectionTemplate;
use App\Models\Theme;
use Database\Seeders\CreateThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class SectionTemplateTest extends TestCase
{
    public function test_renders_successfully()
    {
        $this->seed(CreateThemeSeeder::class);
        $theme = Theme::first();

        Livewire::test(SectionTemplate::class, ['code' => $theme->code])
            ->assertNoRedirect()
            ->assertStatus(200);
    }

    public function test_redirects_when_template_not_found()
    {
        Livewire::test(SectionTemplate::class, ['code' => 'non-existent-code'])
            ->assertRedirect('invitation-template');
    }
}
