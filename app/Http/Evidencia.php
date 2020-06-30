<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{


	protected $table= 'evidencias';   
    protected $fillable = [
      'id_tramite' , 'documento' , 'descripcion' ,
    ];

     public function tramites()
    {
            return $this->belongsToMany('App\Tramites');
    }
}
