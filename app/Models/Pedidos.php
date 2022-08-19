<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_cliente',
        'rua',
        'bairro',
        'apartamento',
        'bloco',
        'telefone',
        'lanche',
        'observacoes',
        'valor_total',
        'troco',
        'forma_pagamento'
    ];
}
