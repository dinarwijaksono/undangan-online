<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Template::create([
            'code' => \Illuminate\Support\Str::random(10),
            'name' => 'example name ' . mt_rand(1, 1000),
            'html_path' => \Illuminate\Support\Str::random(10) . '.html'
        ]);
    }
}
