<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
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


    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), (new LoginRequest())->rules());

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $user = $this->userService->login($request->email, $request->password);

        if (is_null($user)) {
            return response()->json([
                'general' => ['Email atau password salah.']
            ], 400);
        }

        $token = $user->createToken('api-token');
        return response()->json([
            'token' => $token->plainTextToken
        ], 200);
    }
}
