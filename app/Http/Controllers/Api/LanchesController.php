<?php

namespace App\Http\Controllers\Api;

use App\Models\Lanche;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LanchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Lanche::all();
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        Lanche::create($dados);
        // if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            
        //     // Define um aleatório para o arquivo baseado no timestamps atual
        //     $name = uniqid(date('HisYmd'));
    
        //     // Recupera a extensão do arquivo
        //     $extension = $request->foto->extension();
    
        //     // Define finalmente o nome
        //     $nameFile = "{$name}.{$extension}";
    
        //     // Faz o upload:
        //     $upload = $request->foto->storeAs('categories', $nameFile);
        //     Lanche::create([
        //         'nome' => $dados['nome'],
        //         'preco' => $dados['preco'],
        //         'foto' => $nameFile,
        //     ]);
        // }
    }

    public function show($id)
    {
        $lanche = Lanche::select('*')->where('id', $id)->first();
        return $lanche;
    }

    public function update(Request $request, $id)
    {
        $lanche = Lanche::findOrFail($id)->update($request->all());
        return $lanche;
    }

    public function destroy($id)
    {
        $lanche = Lanche::findOrFail($id)->delete();
        return $lanche;
    }
}
