<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;

class UserController extends Controller
{
	public function index()
	{
        //retornar umm array
        // return User::all();
		$users = User::paginate(10);
		return response()->json($users, 200);
	}

	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
			'password' => 'required|string|min:6',
            'photo' => ''
		]);

		try {
			$user = User::create($validatedData);

			if ($user) {
				return response()->json(['message' => 'Usuário criado com sucesso!'], 201);
			}
		} catch (Exception $e) {
			return response()->json(['message' => 'Erro ao criar usuário!'], 401);
		}
	}

	public function show($id)
	{
		return $user = User::findOrFail($id);
	}

	public function update(Request $request, $id)
	{
		try {
			$user = User::findOrFail($id);
			$user->update($request->all());
			if ($user) {
				return response()->json(['message' => 'Usuário atualizado com sucesso!'], 201);
			}
		} catch (Exception $e) {
			return response()->json(['message' => 'Erro ao atualizar usuário!'], 401);
		}
	}

	public function destroy(string $id)
	{
		try {
			$user = User::findOrFail($id);
			$user->delete();
			if ($user) {
				return response()->json(['message' => 'Usuário deletado com sucesso!'], 201);
			}
		} catch (Exception $e) {
			return response()->json(['message' => 'Erro ao deletar usuário!'], 401);
		}
	}
}
