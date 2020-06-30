<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTramitesTable extends Migration
{
      /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('tramites', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');                        
            $table->integer('tipo_id')->unsigned();                       
            $table->timestamps();   


            $table->foreign('tipo_id')
            ->references('id')->on('tipo_tramites')
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
        Schema::dropIfExists('tramites');
    }
}
