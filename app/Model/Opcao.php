<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    protected $primaryKey = 'idOpcao';
    protected $fillable = ['enunciadoOpcao'];
}
