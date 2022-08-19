<?php

namespace App\Http\Controllers\Api;

use App\Models\Bebida;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BebidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bebida::all();
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
