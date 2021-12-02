<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index() {
        $cliente= Cliente::all(); 
       return ['cliente'=> $cliente];
       
    }
    
    public function store (Request $request) {
        $cliente= new Cliente();
        $cliente->nombres=$request->nombre;
        $cliente->tel=$request->tel;
        $cliente->email=$request->email;
        $cliente->estado=$request->estado;
   
        $cliente->save();        
    }
    public function update(Request $request) {
        $cliente= Cliente::findOrFail($request->id);
        $cliente->nombres=$request->nombre;
        $cliente->tel=$request->tel;
        $cliente->email=$request->email;
        $cliente->estado=$request->estado;

        $cliente->save();
    }

    // public function destroy(Request $request) {
    //    $cliente= Cliente::findOrFail($request->id);

    //    $cliente->delete();
    // }
}
