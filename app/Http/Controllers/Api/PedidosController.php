<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
        Pedidos::create($request->all());        
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
