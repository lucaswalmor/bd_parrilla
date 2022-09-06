<?php

namespace App\Http\Controllers\Api;

use App\Models\Lanche;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class LanchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lanches = DB::table('lanches')
            ->join('uploads', 'lanches.id', '=', 'uploads.lanche_id')
            ->get();
        return $lanches;
        // return Lanche::all();
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        Lanche::create([
            'nome' => $dados['nome'],
            'preco' => $dados['preco'],
            // 'ingredientes' => $dados['ingredientes'],
            'ingredientes' => implode(', ', $dados['ingredientes']),
        ]);
    }

    public function fotos() {
        $lanches = DB::table('lanches')
        ->join('uploads', 'lanches.id', '=', 'uploads.lanche_id')
        ->get();

        return view('welcome', compact('lanches'));
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
