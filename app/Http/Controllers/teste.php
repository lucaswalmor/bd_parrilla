<?php

namespace App\Http\Controllers;

use App\Models\Lanche;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class teste extends Controller
{
    public function fotos() {
        $fotos = Lanche::all();
        return view('welcome', compact('fotos'));
    }
}
