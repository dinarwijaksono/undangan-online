<?php

namespace Tests\Feature\Livewire\TemplateVariabel;

use App\Livewire\TemplateVariabel\ListTemplateVariabelComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListTemplateVariabelComponentTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(ListTemplateVariabelComponent::class)
            ->assertStatus(200);
    }
}
