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
        Lanche::create($request->all());
    }

    public function show($id)
    {
        //
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
