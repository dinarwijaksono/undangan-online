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
}
