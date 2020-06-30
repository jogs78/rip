<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_tramite extends Model
{
    protected $table= 'tipo_tramites';   
    protected $fillable = [
      'id' , 'tipo' ,
    ];
    

   public function tramite() 
   { 
   		return $this->hasMany('App\Tramites');
   }
   
}
