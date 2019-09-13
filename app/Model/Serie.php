<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $primaryKey = 'idSerie';
    protected $fillable = ['nmSerie'];
}
