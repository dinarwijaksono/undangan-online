<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthControllerApi extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), (new RegisterRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $emailValidate = Validator::make($request->all(), [
            'email' => 'unique:users,email'
        ]);

        if ($emailValidate->fails()) {
            return response()->json([
                'errors' => ['email' => ['Email tidak tersedia.']]
            ], 400);
        }

        $register = $this->userService->register($request->name, $request->email, $request->password);

        if (is_null($register)) {
            return response()->json([
                'message' => "Proses gagal."
            ], 400);
        }

        return response()->json([
            'name' => $register->name,
            'email' => $register->email
        ], 201);
    }
}
