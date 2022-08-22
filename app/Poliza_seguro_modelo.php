<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poliza_seguro_modelo extends Model
{
    protected $table = 'poliza_seguro';
    protected $primaryKey = 'numero_poliza';
    public $with=['agentes','tipos_polizas','aseguradora','asegurados'];
    public $incrementing=false;
    public $timestamps=false;
    
    public $fillable=[
        'numero_poliza',
        'fecha_inicio',
        'fecha_vigencia',
        'precio',
        'estado_poliza',
        'id_agente',
        'id_tipo_poliza',
        'id_tipo_aseguradora',
        'id_asegurado'
    ];

    public function agentes(){
        return $this -> belongsTo(Agente_modelo::class,'id_agente','id_agente');
    }

    public function tipos_polizas(){
        return $this -> belongsTo(Tipos_polizas_modelo::class,'id_tipo_poliza','id_tipo_poliza');
    }

    public function aseguradoras(){
        return $this -> belongsTo(Aseguradora_modelo::class,'id_tipo_aseguradora','id_tipo_aseguradora');
    }

    public function()
    {
        return $this -> belongsTo(Asegurado_modelo::class,'id_asegurado','id_asegurado');
    }
}
