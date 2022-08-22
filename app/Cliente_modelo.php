<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_modelo extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $with=['agentes'];
    public $incrementing=false;
    public $timestamps=false;
    
    public $fillable=[
        'id_cliente',
        'nombre',
        'apellido_p',
        'apellido_m',
        'email',
        'id_agente'
    ];

    public function agentes(){
        return $this -> belongsTo(Agente_modelo::class,'id_agente','id_agente');
    }
}
