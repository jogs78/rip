<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciaTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_tramites', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('evidencia_id')->unsigned();
            $table->integer('tramites_id')->unsigned();

            $table->timestamps();


            $table->foreign('evidencia_id')
            ->references('id')->on('evidencias')
            ->onDelete('cascade');

            $table->foreign('tramites_id')
            ->references('id')->on('tramites')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencia_tramites');
    }
}
