<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Persona;

    Route::get('/',function(){
        //$response = Http::get('localhost:8000/api/persona');
        //$personas = $response->body();
        //$personas = json_decode($personas);

        $client = new Client();
        $response = $client->request('GET', 'localhost:8000/api/persona');
        $data = $response->getBody();
        $personas = json_decode($data);

        return view('personas.index', ['personas' => $personas]);
    })->name('persona.index');
    
    Route::get('/personas/crear',function(){
        return view('personas.create');
    })->name('persona.crear');
    
    
    Route::post('/personas',function(Request $request){
        $client = new Client();
        $response = $client->request('POST', 'localhost:8000/api/persona', [
            'form_params' => [
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'activo' => 1
            ]
        ]);
    
        return redirect()->route('persona.index')->with('info','Persona agregada');
    })->name('persona.registro');
    
    
    Route::delete('/personas/{id}',function($id){
        $client = new Client();
        $response = $client->request('DELETE', "localhost:8000/api/persona/{$id}",);

        return redirect()->route('persona.index')->with('info','Persona eliminada');
    })->name('persona.eliminar');
    
    Route::get('/personas/editar/{id}',function($id){
        $client = new Client();
        $response = $client->request('GET', "localhost:8000/api/persona/{$id}");
        $data = $response->getBody();
        $personas = json_decode($data);

        $persona = $personas[0];
        return view ('personas.actualizar',['persona' => $persona]);
    })->name('persona.editar');
    
    Route::put('/personas/{id}',function(Request $request, $id){
        $client = new Client();
        $response = $client->request('PUT', "localhost:8000/api/persona/{$id}", [
            'json' => [
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
            ]
        ]);
    
        return redirect()->route('persona.index')->with('info','Persona actualizada');
    
    })->name('persona.editado');


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

