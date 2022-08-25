<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class Filtros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        if($dados['filtro_valores'] == 'dia') {
            $pedido = DB::table('pedidos')
                // ->select('valor_total')
                ->select(DB::raw('SUM(valor_total) as total'))
                ->whereDay('created_at', $dados['data'])
                // ->sum('valor_total');
                ->get();
            return $pedido;
        } else if($dados['filtro_valores'] == 'mes') {
            $pedido = DB::table('pedidos')
                // ->select('valor_total')
                ->select(DB::raw('SUM(valor_total) as total'))
                ->whereMonth('created_at', $dados['data'])
                // ->sum('valor_total');
                ->get();
            return $pedido;
        } else if($dados['filtro_valores'] == 'ano') {
            $pedido = DB::table('pedidos')
                // ->select('valor_total')
                ->select(DB::raw('SUM(valor_total) as total'))
                ->whereYear('created_at', $dados['data'])
                // ->sum('valor_total');
                ->get();
            return $pedido;
        } else if($dados['filtro_total_pedidos'] == 'dia_pedido') {
            $pedido = DB::table('pedidos')
                ->select('id')
                ->whereDay('created_at', $dados['data'])
                ->count();
            return $pedido;
        } else if($dados['filtro_total_pedidos'] == 'mes_pedido') {
            $pedido = DB::table('pedidos')
                ->select('id')
                ->whereMonth('created_at', $dados['data'])
                ->count();
            return $pedido;
        } else if($dados['filtro_total_pedidos'] == 'ano_pedido') {
            $pedido = DB::table('pedidos')
                ->select('id')
                ->whereYear('created_at', $dados['data'])
                ->count();
            return $pedido;
        } else {
            return response('fail', 400);
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
