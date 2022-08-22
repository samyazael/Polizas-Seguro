<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Asegurado_modelo;
use Session;
use DB;


class Asegurado_controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_agente=Session::get('id_agente');
        $asegurado = DB::select("select * from asegurados");
        return $asegurado;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $asegurado = new Asegurado_modelo();
        $asegurado->id_asegurado=$request->get('id_asegurado');
        $asegurado->nombre=$request->get('nombre');
        $asegurado->apellido_p=$request->get('apellido_p');
        $asegurado->apellido_m=$request->get('apellido_m');
        $asegurado->edad=$request->get('edad');
        $asegurado->save();
        return $asegurado;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Asegurado_modelo::find($id);
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
        
        $asegurado = Asegurado_modelo::find($id);
        $asegurado->nombre=$request->get('nombre');
        $asegurado->apellido_p=$request->get('apellido_p');
        $asegurado->apellido_m=$request->get('apellido_m');
        $asegurado->email=$request->get('edad');
        $asegurado->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         return Asegurado_modelo::destroy($id);
    }
}
