<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agente_modelo;
use DB;

class Agente_controlador extends Controller
{
     public function index()
    {
        $agente = Agente_modelo::all();
        return $agente;
    }

}
