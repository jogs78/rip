<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('rfc',171);
            $table->string('genero',171);           
            $table->string('civil',171);
            $table->string('nacionalidad',171);
            $table->string('entidad',171);
            $table->date('fecha_nacimiento');
            $table->string('telefono',171);
            $table->string('celular',171);
            $table->string('email_ins',171);
             $table->date('fecha_inscrpcion');
            $table->string('perfil',171); 
            $table->string('area',171);          
            $table->string('disciplina',171);
            $table->string('nombramiento',171);
            $table->string('tipo_nombramiento',171);
            $table->string('dedicacion',171);
            $table->string('unidad',171);
            $table->date('fecha_contrato');
            $table->string('nivel',171);
            $table->string('siglas',171);
            $table->string('estudios',171);
            $table->string('pais',171);
            $table->string('institucion_otorgante',171);
            $table->date('fecha_titulo');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('beneficiarios');
    }
}
