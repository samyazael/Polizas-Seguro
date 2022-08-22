<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

//Ruta para las vistas//

Route::prefix('Inicio')->group(function(){
    Route::get('paginaInicio',function(){
        return view('inicio');
    });
}); 

Route::prefix('Cliente')->group(function(){
    Route::get('altaClientes',function(){
        return view('clientes.agregarCliente');
    });
});  

Route::prefix('Asegurado')->group(function(){
    Route::get('altaAsegurados',function(){
        return view('asegurados.agregarAsegurados');
    });
});

Route::prefix('registropoliza')->group(function(){
    Route::get('registrarpoliza',function(){
        return view('polizas.registroPolizas');
    });
});

Route::prefix('asignacionpoliza')->group(function(){
    Route::get('asginacionpolizas',function(){
        return view('polizas.asginacionPolizas');
    });
});

//Rutas para las APIS//
Route::apiResource('cliente','Cliente_controlador'); 
Route::apiResource('asegurado','Asegurado_controlador'); 
Route::apiResource('InicioSesion','login_controlador');
Route::post('validar','login_controlador@validar');
Route::get('logout','login_controlador@salir');
Route::apiResource('agentes','Agente_controlador');
Route::apiResource('polizas','Poliza_controlador');
Route::apiResource('aseguradoras','Aseguradora_controlador');
Route::apiResource('tipoPolizas','TiposPolizas_controlador');
Route::post('/','Poliza_controlador@registrar')->name('registro.poliza');
