<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requets;
use App\Cliente_modelo;
use Session;
use DB;

class Cliente_controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id_agente=Session::get('id_agente');
        $clientes = DB::select("select * from clientes 
                                where id_agente = '$id_agente'");
        return $clientes;
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
        
        $cliente = new Cliente_modelo();
        $cliente->id_cliente=$request->get('id_cliente');
        $cliente->nombre=$request->get('nombre');
        $cliente->apellido_p=$request->get('apellido_p');
        $cliente->apellido_m=$request->get('apellido_m');
        $cliente->email=$request->get('email');
        $cliente->id_agente=$request->get('id_agente');

        $cliente->save();
        return $cliente;
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
        return Cliente_modelo::find($id);
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
        $cliente = Cliente_modelo::find($id);
        $cliente->nombre=$request->get('nombre');
        $cliente->apellido_p=$request->get('apellido_p');
        $cliente->apellido_m=$request->get('apellido_m');
        $cliente->email=$request->get('email');
        $cliente->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Cliente_modelo::destroy($id);
    }
}
