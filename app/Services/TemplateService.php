<?php

namespace App\Services;

use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    public function getAll(): ?Collection
    {
        try {
            $template = Template::select('id', 'code', 'name', 'thumbnail_path', 'is_publish', 'created_at', 'updated_at')
                ->orderByDesc('created_at')
                ->get();

            Log::info('get all template success', [
                'user_id' => auth()->user()->id
            ]);

            return $template;
        } catch (\Throwable $th) {
            Log::error('get all template failed', [
                'user_id' => auth()->user()->id,
                'message_error' =>  $th->getMessage()
            ]);

            return null;
        }
    }
}
