<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function register(RegisterRequest $request): JsonResponse
    {

        return try_catch(null, null, null, function () use ($request) {

            $user = User::create($request->validated());
            return ['token' => $user->createToken('Personal Access Token')->accessToken];

        });

    }


    public function login(LoginRequest $request): JsonResponse
    {

        try {

            $data = $request->validated();

            $user = User::where('mobile', $data['mobile'])->firstOrFail();

            if (Hash::check($data['password'], $user->password)) {

                return response()->json([
                    'token' => $user->createToken('Personal Access Token')->accessToken
                ]);

            } else
                return response()->json([
                    'message' => 'کلمه عبور اشتباه میباشد'
                ], 401);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => 'entity not found'
            ], 404);
        }
    }
}
