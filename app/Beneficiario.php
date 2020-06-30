<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class beneficiario extends Model
{
    //
    protected $primaryKey = 'user_id';
    protected $fillable = [
        
        'rfc', 'genero', 'civil', 'nacionalidad', 'entidad', 'fecha_nacimiento', 'telefono', 'celular', 'email_ins' ,'fecha_inscrpcion' , 'perfil' , 'area' , 'disciplina', 'nombramiento', 'tipo_nombramiento' , 'dedicacion' , 'unidad', 'fecha_contrato', 'nivel' , 'siglas' , 'estudios' , 'pais' , 'institucion_otorgante' , 'fecha_titulo',
    ];

           
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
