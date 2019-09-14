<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    protected $primaryKey = 'idDisciplina';
    protected $fillable = ['nmDisciplina'];
}
