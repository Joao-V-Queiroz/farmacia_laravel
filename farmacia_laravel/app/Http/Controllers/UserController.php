<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->get(); # Filtrar os usuários por ordem decrescente de id
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        $title = 'Add new User';
        return view('admin.add_edit_user', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'photo' => 'mimes:jpeg,jpg,png|max:2048'
        ]);

        $filePath = public_path('uploads');
        $insert = new User();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->password = bcrypt('password');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $file->move($filePath, $fileName);
            $insert->photo = $fileName;
        }

        $result = $insert->save();
        Session::flash('sucess', 'Usuário adicionado com sucesso');
        return redirect()->route('user.index');


    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
