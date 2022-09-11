<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFotoBebidas extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'path', 'bebida_id'];
}
