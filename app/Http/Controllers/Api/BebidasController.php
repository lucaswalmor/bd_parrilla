<?php

namespace App\Http\Controllers\Api;

use App\Models\Bebida;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BebidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bebidas = DB::table('bebidas')
            ->join('upload_foto_bebidas as B', 'bebidas.id', '=', 'B.bebida_id')
            ->get();
        return $bebidas;
    }

    public function store(Request $request)
    {
        Bebida::create($request->all());
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
        $bebida = Bebida::select('*')->where('id', $id)->first();
        return $bebida;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $bebida = Bebida::findOrFail($id)->update($request->all());
        return $bebida;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bebida = Bebida::findOrFail($id)->delete();
        return $bebida;
    }
}
