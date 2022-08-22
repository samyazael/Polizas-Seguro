<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora_modelo extends Model
{
    protected $table = 'aseguradora';
    protected $primaryKey = 'id_agente';
    public $timestamps=false;
    //public $incrementing=false;
    
    public $fillable=[
        'id_tipo_aseguradora',
        'nombre_aseguradora'
    ];
}
