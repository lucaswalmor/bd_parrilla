<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bebida;
use App\Models\UploadFotoBebidas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as RoutingController;

use function GuzzleHttp\Promise\all;

class FotoBebidasController extends RoutingController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('deucerto');
    }
    
    public function store(Request $request)
    {
        $bebida_id = Bebida::select('*')->orderBy('created_at', 'desc')->first();

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;

        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->image->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $request->image->storeAs('public/bebidas/' . $bebida_id->id . '/' . $bebida_id->nome, $nameFile);
            $upload = 'bebidas/'. $bebida_id->id . '/' . $bebida_id->nome . '/' . $nameFile;
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();


            UploadFotoBebidas::create([
                'image' => $nameFile,
                'path' => $upload,
                'bebida_id' => $bebida_id->id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
