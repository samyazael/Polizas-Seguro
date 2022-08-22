<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Poliza_seguro_modelo;
use Session;
use DB;


class Poliza_controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $id_agente=Session::get('id_agente');
        $poliza = DB::SELECT("Select asegurados.id_asegurado,
                                     concat(asegurados.nombre,' ',asegurados.apellido_p,' ',asegurados.apellido_m) as nombre,edad,
                                     tipos_polizas.nombre_poliza,
                                     aseguradora.nombre_aseguradora,
                                     poliza_seguro.estado_poliza,
                                     poliza_seguro.fecha_inicio,
                                     poliza_seguro.fecha_vigencia
                            from asegurados join poliza_seguro on asegurados.id_asegurado = poliza_seguro.id_asegurado
                            join tipos_polizas on tipos_polizas.id_tipo_poliza = poliza_seguro.id_tipo_poliza
                            join aseguradora on aseguradora.id_tipo_aseguradora = poliza_seguro.id_tipo_aseguradora
                            join agentes on agentes.id_agente = poliza_seguro.id_agente
                           ");
        return $poliza;
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function aseguradora()
    {
      
    }

      public function tipos_poliza()
    {
        
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $poliza = new Poliza_seguro_modelo();
        $poliza->numero_poliza=$request->get('numero_poliza');
        $poliza->fecha_inicio=$request->get('fecha_inicio');
        $poliza->fecha_vigencia=$request->get('fecha_vigencia');
        $poliza->precio=$request->get('precio');
        $poliza->estado_poliza=$request->get('estado_poliza');
        $poliza->id_agente=$request->get('id_agente');
        $poliza->id_tipo_poliza=$request->get('id_tipo_poliza');
        $poliza->id_tipo_aseguradora=$request->get('id_tipo_aseguradora');
        $poliza->id_asegurado=$request->get('id_asegurado');
        $poliza->save();
        // //return $poliza;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
