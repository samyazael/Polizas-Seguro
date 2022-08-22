<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_polizas_modelo extends Model
{
    protected $table = 'tipos_polizas';
    protected $primaryKey = 'id_tipo_poliza';
    public $timestamps=false;
    //public $incrementing=false;
    
    public $fillable=[
        'id_tipo_poliza',
        'nombre_poliza'
    ];
}
