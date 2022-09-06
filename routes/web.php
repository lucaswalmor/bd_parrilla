<?php

use App\Http\Controllers\teste;
use App\Models\Lanche;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $lanches = DB::table('lanches')
    ->join('uploads', 'lanches.id', '=', 'uploads.lanche_id')
    ->get();
    
    return view('welcome', compact('lanches'));
});
