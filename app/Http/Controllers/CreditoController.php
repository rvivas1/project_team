<?php

namespace App\Http\Controllers;
use App\Models\Credito;

use Illuminate\Http\Request;

class CreditoController extends Controller
{
    //
    // public function index() {
    //     $credito=Credito::all();
    //     return ['cred' => $credito];
    // }

    public function index() {
        $credito= Credito::join('clientes','creditos.id_clien','=','clientes.id')
        ->select('creditos.valor','creditos.edo','clientes.nombres as clientes')->get();
        
        return ['credito'=>$credito];
       }
   
       public function store(Request $request) {
           $credito= new Credito();
           $credito->valor=$request->valor;
           $credito->edo=$request->estado;
   
           $credito->id_clien=$request->id_clien;
   
           $credito->save();
       }

       public function update(Request $request){
           $credito = Credito::findOrFail($request->id);
           $credito-> valor = $request -> valor;
           $credito-> edo = $request -> estado;

           $credito-> id_clien = $request -> id_clien;

           $credito->save();
       }

       public function destroy(Request $request){
        $credito= Credito:: findOrFail($request->id);
        
        $credito->delete();
    }



}
