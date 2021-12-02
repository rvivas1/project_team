<?php

namespace App\Http\Controllers;
use App\Models\Obsequio;

use Illuminate\Http\Request;

class ObsequioController extends Controller
{
    //
    public function index() {
        $obsequio= Obsequio::join('productos','obsequios.id_prod','=','productos.id')
        ->join('clientes','obsequios.id_clien','=','clientes.id')
        ->select('obsequios.valor_obs','obsequios.fecha','clientes.nombres as cliente',
        'productos.nombre as obsequio')->get();
        
        return ['obsequio'=>$obsequio];
       }


    public function store(Request $request){
        $obsequio= new Obsequio();
        $obsequio->fecha=$request->fecha;
        $obsequio->valor_obs=$request->valor_obs;
        $obsequio->edo=$request->edo;

        $obsequio->id_prod = $request -> id_prod;
        $obsequio->id_clien = $request -> id_clien;

        $obsequio->save();
    }
    public function update(Request $request){
        $obsequio = Obsequio::findOrFail($request->id);
        $obsequio-> fecha = $request -> fecha;
        $obsequio-> valor_obs = $request -> valor_obs;
        $obsequio-> edo = $request -> edo;

        $obsequio-> id_prod = $request -> id_prod;
        $obsequio-> id_clien = $request -> id_clien;

        $obsequio->save();
    }
    public function destroy(Request $request){
        $obsequio= Obsequio:: findOrFail($request->id);
        
        $obsequio->delete();
    }


}
