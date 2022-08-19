<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = User::select('*')->get();
        return $usuario;
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $dados = $request->only(['name', 'email', 'password']);
        $senha = Hash::make($dados['password']);

        $usuario = User::findOrFail($id)->update([
            'name' => $dados['name'],
            'password' => $senha,
            'email' => $dados['email']
        ]);
        return $usuario;
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id)->delete();
        return $usuario;
    }
}
