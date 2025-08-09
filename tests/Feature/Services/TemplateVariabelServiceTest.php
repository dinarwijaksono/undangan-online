<?php

namespace Tests\Feature\Services;

use Database\Seeders\CreateTemplateSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TemplateVariabelServiceTest extends TestCase
{
    protected $templateService;
    public $template;

    public function setUp(): void
    {
        parent::setUp();

        $this->templateService = app()->make(\App\Services\TemplateVariabelService::class);

        $this->seed(CreateTemplateSeeder::class);
        $this->template = \App\Models\Template::first();
    }

    public function test_store()
    {
        $name = 'Test Variable';
        $type = 'text';
        $defaultValue = 'Default Value';

        $variabel = $this->templateService->store($this->template->id, $name, $type, $defaultValue);

        $this->assertNotNull($variabel);
        $this->assertEquals($this->template->id, $variabel->template_id);
        $this->assertEquals($name, $variabel->name);
        $this->assertEquals($type, $variabel->type);
        $this->assertEquals($defaultValue, $variabel->default_value);
        $this->assertDatabaseHas('template_variabels', [
            'template_id' => $this->template->id,
            'name' => $name,
            'type' => $type,
            'default_value' => $defaultValue,
        ]);
    }
}
