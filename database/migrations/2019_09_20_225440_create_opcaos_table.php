<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcaos', function (Blueprint $table) {
            $table->integer('idOpcao')->autoIncrement();
            $table->string('enunciadoOpcao');
            $table->boolean('corretaOpcao')->default(false);
            $table->integer('idQuestao');
            $table->foreign('idQuestao')->references('idQuestao')->on('questaos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcaos');
    }
}
