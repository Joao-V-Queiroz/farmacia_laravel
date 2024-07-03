<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	public function auth(Request $request)
	{
		try {
			$user = User::where('email', $request->email)->first();
			if (!$user || !Hash::check($request->password, $user->password)) {
				throw ValidationException::withMessages([
					'email' => ['The provided credentials are incorrect.'],
				]);
			}
			$user->tokens()->delete();
			$token = $user->createToken('token-name')->plainTextToken;
			$dados = User::where('email', $request->email)->first();

			return response()->json([
				'token' => $token,
				'user' => $dados,
				'status' => 200, 'sucess' => true
			]);
		} catch (Exception $e) {
			return response()->json([
				'message' => $e->getMessage(),
			], 400);
		}
	}
}
