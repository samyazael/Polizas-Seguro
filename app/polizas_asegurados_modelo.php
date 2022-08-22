<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class polizas_asegurados_modelo extends Model
{
    protected $table = 'polizas_asegurados';
    protected $primaryKey = 'id_detalle_asegurados';
    public $with=['poliza_seguro'];
    public $with=['asegurados'];
    public $incrementing=false;
    
    public $fillable=[
        'id_detalle_asegurados'
    ];

    public function poliza_seguro(){
        return $this -> hasMany(Poliza_seguro_modelo::class,'numero_poliza','numero_poliza');
    }

    public function asegurados(){
        return $this -> hasMany(Asegurado_modelo::class,'id_asegurado','id_asegurado');
    }
}
