<?php

namespace App\Http\Controllers\Api;

use App\Models\TaxaEntrega;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaxaEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaxaEntrega::all();
    }

    public function store(Request $request)
    {
        TaxaEntrega::create($request->all());
    }

    public function show($id)
    {
        $taxa = TaxaEntrega::select('*')->where('id', $id)->first();
        return $taxa;
    }

    public function update(Request $request, $id)
    {
        $taxa = TaxaEntrega::findOrFail($id)->update($request->all());
        return $taxa;        
    }

    public function destroy($id)
    {
        $taxa = TaxaEntrega::findOrFail($id)->delete();
        return $taxa;
    }
}
