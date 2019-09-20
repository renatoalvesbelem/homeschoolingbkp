<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{

    protected $primaryKey = 'idQuestao';
    protected $fillable = ['enunciadoQuestao','respostaQuestao','idSerie','idDisciplina'];
    public function serie()
    {
        return $this->hasOne('App\Model\Serie');
    }

    public function disciplina()
    {
        return $this->hasOne('App\Model\Disciplina');
    }

    public function opcao()
    {
        return $this->hasMany('App\Model\Opcao','idQuestao');
    }

    public $timestamps = false;
}
