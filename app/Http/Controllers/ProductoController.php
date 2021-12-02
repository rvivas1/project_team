<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index() {
        $producto= Producto::all(); 
       return ['producto'=> $producto];
       
    }


    public function store(Request $request){
        $producto= new Producto();
        $producto->cod_prod=$request->cod_prod;
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->tp_serv=$request->tp_serv;
        $producto->stock=$request->stock;
        $producto->fec_venc=$request->fec_venc;
        $producto->edo=$request->edo;

        $producto->save();
    }
    public function update(Request $request) {
        $producto= Producto::findOrFail($request->id);
        $producto->cod_prod=$request->cod_prod;
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->tp_serv=$request->tp_serv;
        $producto->stock=$request->stock;
        $producto->fec_venc=$request->fec_venc;
        $producto->edo=$request->edo;

        $producto->save();
    }

    public function destroy(Request $request) {
       $producto= Producto::findOrFail($request->id);

       $producto->delete();
    }
}
