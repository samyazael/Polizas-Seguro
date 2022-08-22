<?php

namespace App\Http\Controllers;

use Session;
use Cache;
use Cookie;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agente_modelo;
use DB;
class login_controlador extends Controller
{

    public function logear(Request $request)
    {
      return view('login');     
    }

    public function validar(Request $request)
     {
        /*return 'HOLA';*/
        
        
        if($request)

        {
            
            $usuario=$request->get('user');
            $pass=$request->get('pass');
           

           /*No se puede hacer una consulta usando ALL y WHERE*/

           $res=DB::select("select agentes.email, agentes.contrasenia, agentes.activo, agentes.id_agente
                            from agentes 
                            where email ='$usuario' and contrasenia = '$pass'");
            //0$res=DB::table('agentes')
            //->select('agentes.nombre','agentes.email','agentes.contrasenia','agentes.activo')
            //->where('agentes.email','=',$usuario)
            //->where('agentes.contrasenia','=',$pass)
            //->first();

           //return $res;
           

            if(!empty($res))  //Si al consultar en la tabla usuario existe un dato 
            {
                /*Datos que provienen de la BD*/
                $usuario=$res[0]->email;
                $pass=$res[0]->contrasenia;
                $status=$res[0]->activo;
                $clave=$res[0]->id_agente;


                //OBTENGO LOS DATOS DE INICIO DE SESION DE LOS AGENTES, esto no va, Ya tienes los datos
                $usuario=Agente_modelo::all()
                ->where('activo','=',1)
                ->first();
                Session::put('activo',$status);                

                // SECCION QUE MANEJA EL ACCESO DE LOS ALUMNOS
                if($status==1)
                {
                    $agente=Agente_modelo::all()
                    ->where('id_agente','=',$clave)
                    ->first();
                    Session::put('agentes',$agente->nombre.' '.$agente->apellido_p.' '.$agente->apellido_m);
                    Session::put('id_agente',$clave);
                    
                    //\Flash::success('Esta es una prueba');
                    return view('inicio');
                }   
            }
            
            else
                return 'Usuario y/o contraseña incorrecta, o bien ya no es un usuario vigente';
                //return view('login');
                //return Redirect::to('/'); //->with('error',true);
        }

        
     }
    
   
     public function salir()
     {
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
