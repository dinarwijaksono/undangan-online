<?php

namespace Tests\Feature\Livewire\Template;

use App\Livewire\Template\ListAssetCoverSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListAssetCoverSectionTest extends TestCase
{
    public function test_renders_successfully()
    {
        Livewire::test(ListAssetCoverSection::class)
            ->assertStatus(200);
    }
}
