<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TemplateControllerApi extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $code = Str::random(10);

        Template::create([
            'code' => $code,
            'name' => $request->name,
            'css_path' => json_encode([]),
            'js_path' => json_encode([])
        ]);

        Log::info('template create success', [
            'user_id' => auth()->user()->id,
            'template_code' => $code
        ]);

        return response()->json([
            'name' => $request->name,
            'code' => $code
        ], 201);
    }

    public function findByCode($code)
    {
        $template = Template::where('code', $code)->get();

        if ($template->isEmpty()) {

            Log::warning('validasi error', [
                'user_id' => auth()->user()->id,
                'template_code' => $code
            ]);

            return response()->json([
                'message' => [
                    'Template tidak ditemukan.'
                ]
            ], 400);
        }

        $template = $template->first();

        Log::info('find template by code success', [
            'user_id' => auth()->user()->id,
            'template_code' => $code
        ]);

        return response()->json([
            'code' => $template->code,
            'name' => $template->name,
            'thumbnail_path' => $template->thumbnail_path,
            'html_path' => $template->html_path,
            'css_path' => $template->css_path,
            'js_path' => $template->js_path,
            'is_publish' => $template->is_publish,
            'created_at' => $template->created_at,
            'updated_at' => $template->updated_at
        ], 200);
    }

    public function getAll(): JsonResponse
    {
        $template = Template::select(
            'id',
            'code',
            'name',
            'thumbnail_path',
            'is_publish',
            'created_at',
            'updated_at'
        )->orderByDesc('created_at')
            ->get();

        Log::info('get all template success', [
            'user_id' => auth()->user()->id
        ]);

        return response()->json($template, 200);
    }

    public function uploadAsset(Request $request, $code): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|extensions:html,css,js',
            'file_type' => 'required'
        ]);

        if ($validator->fails()) {
            Log::warning('upload file failed, validate error', [
                'user_id' => auth()->user()->id,
                'file_type' => $request->file_type
            ]);

            return response()->json([
                'errors' => $validator->errors(),
                'message' => [
                    'Upload file gagal, validasi error.'
                ]
            ], 400);
        }

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $name = Str::random(10) . '.' . $extension;
        $file->storeAs($extension, $name, 'public-custom');

        $template = Template::where('code', $code)->get();
        if ($template->isEmpty()) {
            Log::warning('upload file failed, code template is not exist', [
                'user_id' => auth()->user()->id,
                'file_type' => $request->file_type
            ]);

            return response()->json([
                'message' => [
                    'Upload file gagal, kode template tidak ditemukan.'
                ]
            ], 400);
        }
        $template = $template->first();

        if ($extension == 'css') {
            $array = json_decode($template->css_path);
            $array[] = $name;

            Template::where('code', $code)->update([
                'css_path' => json_encode($array)
            ]);
        }

        if ($extension == 'js') {
            $array = json_decode($template->js_path);
            $array[] = $name;

            Template::where('code', $code)->update([
                'js_path' => json_encode($array)
            ]);
        }

        if ($extension == 'html') {
            Template::where('code', $code)->update([
                'html_path' => $name
            ]);
        }

        return response()->json([
            'message' => 'Asset berhasil diupload.'
        ], 200);
    }

    public function delete(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required'
        ]);

        if ($validator->fails()) {
            Log::warning('delete template failed, validate error', [
                'user_id' => auth()->user()->id,
                'template_code' => $request->code
            ]);

            return response()->json([
                'message' => ['Template gagal dihapus.']
            ], 400);
        }

        Template::where('code', $request->code)
            ->delete();

        Log::info('delete template success', [
            'user_id' => auth()->user()->id,
            'template_code' => $request->code
        ]);

        return response()->json([
            'message' => ['Template berhasil dihapus.']
        ], 204);
    }
}
