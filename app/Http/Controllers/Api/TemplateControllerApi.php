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
            'name' => $request->name
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
}
