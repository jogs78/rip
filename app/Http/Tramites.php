<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    //
    protected $table= 'tramites';   
    protected $fillable = [
      'fecha' , 'tipo_id'   ,'users_id',
    ];

 public function users()
    {
            return $this->belongsToMany('App\User');
    }

   public function tipo() 
   { 
   		return $this->hasOne('App\Tipo_tramite'); 
   }

   public function evidencias()
    {
            return $this->belongsToMany('App\Evidencia');
    }

}
