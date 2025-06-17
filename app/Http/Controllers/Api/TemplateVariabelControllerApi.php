<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplateVariabel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemplateVariabelControllerApi extends Controller
{
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'template_id' => 'required',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            Log::warning('create template variabel failed, validate error', [
                'user_id' => auth()->user()->id,
                'template_id' => $request->template_id,
            ]);

            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        TemplateVariabel::create([
            'template_id' => $request->template_id,
            'name' => $request->name,
            'type' => isset($request->type) ? $request->type : 'text',
            'default_value' => isset($request->default_value) ? $request->default_value : null
        ]);

        Log::info('create template variabel success', [
            'user_id' => auth()->user()->id,
            'template_id' => $request->template_id,
        ]);

        return response()->json([
            'message' => ['Variabel berhasil disimpan.']
        ], 200);
    }

    public function getAll($code): JsonResponse
    {
        $template = Template::where('code', $code)->get();
        if ($template->isEmpty()) {

            Log::warning('get all template variabel failed, template not exist', [
                'user_id' => auth()->user()->id,
                'template_code' => $code
            ]);

            return response()->json([
                'message' => 'Template tidak ditemukan.',
                'errors' => ['template' => 'Template tidak ditemukan.']
            ], 400);
        }

        $template = $template->first();

        $templateVariabel = TemplateVariabel::where('template_id', $template->id)
            ->select('id', 'template_id', 'name', 'default_value', 'created_at')
            ->get();

        Log::info('get all template variabel success', [
            'user_id' => auth()->user()->id,
            'template_id' => $template->id
        ]);

        return response()->json($templateVariabel, 200);
    }

    public function delete(Request $request): ?JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            Log::warning('delete template variabel failed, validate error', [
                'user_id' => auth()->user()->id,
                'id' => $request->id,
            ]);

            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        TemplateVariabel::where('id', $request->id)->delete();

        Log::info('delete template variabel success', [
            'user_id' => auth()->user()->id,
            'id' => $request->id
        ]);

        return response()->json([], 204);
    }
}
