<?php

namespace App\Services;

use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
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

    public function findByCode(string $code): ?Template
    {
        try {

            $template = Template::where('code', $code)
                ->select(
                    'id',
                    'code',
                    'name',
                    'cover_path',
                    'html_path',
                    'css_path',
                    'js_path',
                    'img_path',
                    'is_publish',
                    'created_at',
                    'updated_at'
                )
                ->first();

            Log::info('find template by code success', [
                'user_id' => auth()->user()->id,
                'template_code' => $code
            ]);

            return $template;
        } catch (\Throwable $th) {
            Log::error('create template failed', [
                'user_id' => auth()->user()->id,
                'template_code' => $code,
                'message_error' =>  $th->getMessage()
            ]);

            return null;
        }
    }

    public function getAll(): ?Collection
    {
        try {
            $template = Template::select('id', 'code', 'name', 'cover_path', 'is_publish', 'created_at', 'updated_at')
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

    public function updateContentHtml(string $fileName, string $content): bool
    {
        try {
            if (!Storage::disk('public-custom')->exists("html/$fileName")) {
                throw new \Exception("File tidak ditemukan");
            }

            Log::info('update content html success', [
                'user_id' => auth()->user()->id,
                'file_name' => $fileName
            ]);

            Storage::disk('public-custom')->put("html/$fileName", $content);

            return true;
        } catch (\Throwable $th) {
            Log::error('update content html failed', [
                'user_id' => auth()->user()->id,
                'file_name' => $fileName,
                'message_error' => $th->getMessage()
            ]);

            return false;
        }
    }

    public function updateAssetTemplate(string $code, string $type, string $fileName): void
    {
        try {
            $template = Template::where('code', $code)->first();

            if ($type == 'css') {
                $asset = json_decode($template->css_path);
                $asset[] = $fileName;

                Template::where('code', $code)->update([
                    'css_path' => json_encode($asset),
                    'updated_at' => Carbon::now()
                ]);
            } elseif ($type == 'js') {
                $asset = json_decode($template->js_path);
                $asset[] = $fileName;

                Template::where('code', $code)->update([
                    'js_path' => json_encode($asset),
                    'updated_at' => Carbon::now()
                ]);
            } elseif ($type == 'cover') {
                $asset = json_decode($template->cover_path);
                $asset[] = $fileName;

                Template::where('code', $code)->update([
                    'cover_path' => json_encode($asset),
                    'updated_at' => Carbon::now()
                ]);
            } elseif ($type == 'img') {
                $asset = json_decode($template->img_path);
                $asset[] = $fileName;

                Template::where('code', $code)->update([
                    'img_path' => json_encode($asset),
                    'updated_at' => Carbon::now()
                ]);
            }

            Log::info('update asset template success', [
                'user_id' => auth()->user()->id,
                'template_code' => $code,
                'asset_type' => $type,
                'file_name' => $fileName
            ]);
        } catch (\Throwable $th) {
            Log::error('update asset template failed', [
                'user_id' => auth()->user()->id,
                'template_code' => $code,
                'asset_type' => $type,
                'file_name' => $fileName,
                'message' => $th->getMessage()
            ]);
        }
    }

    public function deleteAssetTemplate(string $code, string $type, string $fileName): void
    {
        try {
            $template = Template::where('code', $code)->first();

            if ($type == 'css') {
                $asset = json_decode($template->css_path);

                $assetNew = [];
                for ($i = 0; $i < count($asset); $i++) {
                    if ($fileName != $asset[$i]) {
                        $assetNew[] = $asset[$i];
                    }
                }

                Template::where('code', $code)->update([
                    'css_path' => json_encode($assetNew),
                    'updated_at' => Carbon::now()
                ]);
            }

            if ($type == 'js') {
                $asset = json_decode($template->js_path);

                $assetNew = [];
                for ($i = 0; $i < count($asset); $i++) {
                    if ($fileName != $asset[$i]) {
                        $assetNew[] = $asset[$i];
                    }
                }

                Template::where('code', $code)->update([
                    'js_path' => json_encode($assetNew),
                    'updated_at' => Carbon::now()
                ]);
            }

            Log::info('delete asset template success', [
                'user_id' => auth()->user()->id,
                'template_code' => $code,
                'asset_type' => $type,
                'file_name' => $fileName
            ]);
        } catch (\Throwable $th) {
            Log::error('delete asset template failed', [
                'user_id' => auth()->user()->id,
                'template_code' => $code,
                'asset_type' => $type,
                'file_name' => $fileName,
                'message' => $th->getMessage()
            ]);
        }
    }
}
