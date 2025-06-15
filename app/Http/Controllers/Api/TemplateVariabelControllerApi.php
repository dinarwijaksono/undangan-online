<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        return response()->json([
            'message' => ['Variabel berhasil disimpan.']
        ], 200);
    }
}
