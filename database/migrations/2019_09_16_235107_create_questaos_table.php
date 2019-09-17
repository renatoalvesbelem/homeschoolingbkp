<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questaos', function (Blueprint $table) {
            $table->integer('idQuestao')->autoIncrement();
            $table->string('enunciadoQuestao');
            $table->string('respostaQuestao')->nullable();
            $table->integer('idSerie');
            $table->integer('idDisciplina');
            $table->foreign('idSerie')->references('idSerie')->on('series');
            $table->foreign('idDisciplina')->references('idDisciplina')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questaos');
    }
}
