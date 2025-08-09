<?php

namespace App\Services;

use App\Models\TemplateVariabel;
use Illuminate\Support\Facades\Log;

class TemplateVariabelService
{
    public function store(int $templateId, string $name, string $type, string $defaultValue): ?TemplateVariabel
    {
        $var = TemplateVariabel::create([
            'template_id' => $templateId,
            'name' => $name,
            'type' => $type,
            'default_value' => $defaultValue,
        ]);

        Log::info('store template success', [
            'template_id' => $templateId,
            'variabel_name' => $name
        ]);

        return $var;
    }
}
