<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
     protected $table= 'notificaciones';   
    protected $fillable = [
      'emisor' , 'receptor'  , 'mensaje' ,
    ];

        public function user()
    {
        return $this->belongsTo('App\User');
    }
}
