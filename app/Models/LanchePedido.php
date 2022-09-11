<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanchePedido extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'lanche_id', 'preco', 'ingredientes', 'pedido_id'];
}
