<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\TemplateVariabel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTemplateVariabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $template = Template::first();

        TemplateVariabel::create([
            'template_id' => $template->id,
            'name' => 'variabel test' . mt_rand(1, 1000),
            'type' => 'text',
            'default_value' => 'default value'
        ]);
    }
}
