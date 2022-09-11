<?php

namespace App\Http\Controllers\Api;

use App\Models\BebidaPedido;
use App\Models\LanchePedido;
use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $somas = Pedidos::all()->sum('valor_total');
        $pedidos = Pedidos::all();
        $array_pedidos = [];
        array_push($array_pedidos, ['somas' => $somas, 'pedidos' => $pedidos]);
        
        return $array_pedidos;

    }
    
    public function store(Request $request)
    {
        $dados = $request->all();
        $pedido_id = Pedidos::create([
            'nome_cliente' => $dados['nome_cliente'],
            'codigo_pedido' => $dados['codigo_pedido'],
            'cpf' => $dados['cpf'],
            'rua' => $dados['rua'],
            'bairro' => $dados['bairro'],
            'ponto_referencia' => $dados['ponto_referencia'],
            'apartamento' => $dados['apartamento'],
            'bloco' => $dados['bloco'],
            'telefone' => $dados['telefone'],
            'valor_total' => $dados['valor_total'],
            'troco' => $dados['troco'],
            'forma_pagamento' => $dados['forma_pagamento'],
        ]);

        for($i = 0; $i < count($dados['bebida']); $i++) {
            BebidaPedido::create([
                'nome' => $dados['bebida'][$i]['nome'],
                'preco' => $dados['bebida'][$i]['preco'],
                'bebida_id' => $dados['bebida'][$i]['bebida_id'],
                'pedido_id' => $pedido_id->id
            ]);
        }

        for($i = 0; $i < count($dados['lanche']); $i++) {
            LanchePedido::create([
                'nome' => $dados['lanche'][$i]['nome'],
                'preco' => $dados['lanche'][$i]['preco'],
                'ingredientes' => $dados['lanche'][$i]['ingredientes'],
                'observacoes' => $dados['observacoes'],
                'lanche_id' => $dados['lanche'][$i]['lanche_id'],
                'pedido_id' => $pedido_id->id
            ]);
        }
    }

    public function show($id)
    {        
        $pedido = Pedidos::select('*')->where('id', $id)->first();
        return $pedido;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedidos::findOrFail($id)->update($request->all());
        return $pedido;
    }

    public function destroy($id)
    {
        $Pedidos = Pedidos::findOrFail($id)->delete();
        return $Pedidos;
    }
}
