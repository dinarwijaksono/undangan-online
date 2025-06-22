<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\DescriptionTemplateSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DescriptionTemplateSectionTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(DescriptionTemplateSection::class)
            ->assertStatus(200);
    }
}
