<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agente_modelo extends Model
{
    protected $table = 'agentes';
    protected $primaryKey = 'id_agente';
    public $timestamps=false;
    //public $incrementing=false;
    
    public $fillable=[
        'id_agente',
        'nombre',
        'apellido_p',
        'apellido_m',
        'email',
        'contrasenia',
        'activo'
    ];
}
