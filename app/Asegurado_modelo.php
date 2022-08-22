<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asegurado_modelo extends Model
{
    protected $table = 'asegurados';
    protected $primaryKey = 'id_asegurado';
    public $timestamps=false;
    //public $incrementing=false;
    
    public $fillable=[
        'id_asegurado',
        'nombre',
        'apellido_p',
        'apellido_m',
        'edad'
    ];
}
