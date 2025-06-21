<?php

namespace App\Services;

use App\Models\Template;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TemplateService
{
    public function create(User $user, string $name, string $htmlFileName): ?Template
    {
        try {

            $template = Template::create([
                'code' => Str::random(10),
                'name' => $name,
                'html_path' => $htmlFileName
            ]);

            Log::info('create template success', [
                'user_id' => $user->id,
                'template_code' => $template->code
            ]);

            return $template;
        } catch (\Throwable $th) {
            Log::error('create template failed', [
                'user_id' => $user->id,
                'template_name' => $name,
                'message_error' =>  $th->getMessage()
            ]);

            return null;
        }
    }
}
