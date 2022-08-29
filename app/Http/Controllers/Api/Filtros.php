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
        $mes = date('m');
        $somas_janeiro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '01')
            ->sum('valor_total');
        $somas_fevereiro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '02')
            ->sum('valor_total');
        $somas_marco = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '03')
            ->sum('valor_total');
        $somas_abril = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '04')
            ->sum('valor_total');
        $somas_maio = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '05')
            ->sum('valor_total');
        $somas_junho = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '06')
            ->sum('valor_total');
        $somas_julho = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '07')
            ->sum('valor_total');
        $somas_agosto = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '08')
            ->sum('valor_total');
        $somas_setembro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '09')
            ->sum('valor_total');
        $somas_outubro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '10')
            ->sum('valor_total');
        $somas_novembro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '11')
            ->sum('valor_total');
        $somas_dezembro = DB::table('pedidos')
            ->select('*')
            ->whereMonth('created_at', '12')
            ->sum('valor_total');
            
        $somas = [];
        array_push($somas, [
            $somas_janeiro, $somas_fevereiro, $somas_marco, 
            $somas_abril, $somas_maio, $somas_junho, 
            $somas_julho, $somas_agosto, $somas_setembro,
            $somas_outubro, $somas_novembro, $somas_dezembro
        ]);
        return $somas;
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
                ->select('valor_total')
                ->whereDay('created_at', $dados['data'])
                ->sum('valor_total');
            return $pedido;
        } else if($dados['filtro_valores'] == 'mes') {
            $pedido = DB::table('pedidos')
                ->select('valor_total')
                ->whereMonth('created_at', $dados['data'])
                ->sum('valor_total');
            return $pedido;
        } else if($dados['filtro_valores'] == 'ano') {
            $pedido = DB::table('pedidos')
                ->select('valor_total')
                ->whereYear('created_at', $dados['data'])
                ->sum('valor_total');
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
        } else if(!empty($dados['cpf']) && $dados['compra_cliente_dia'] == 'mes') {
            $cliente = DB::table('pedidos')
                ->select('cpf')
                ->whereMonth('created_at', $dados['data'])
                ->sum('valor_total');
            return $cliente;
        } else if(!empty($dados['cpf']) && $dados['compra_cliente_dia'] == 'ano') {
            $cliente = DB::table('pedidos')
                ->select('cpf')
                ->whereYear('created_at', $dados['data'])
                ->sum('valor_total');
            return $cliente;
        } else if(!empty($dados['cpf_cliente'])) {
            $cliente = DB::table('pedidos')
                ->select('*')
                ->where('cpf', $dados['cpf_cliente'])
                ->get();
            return $cliente;
        } else {
            return response('fail', 400);
        }
        
        // filtrar soma total de compra de um cliente 
        
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
