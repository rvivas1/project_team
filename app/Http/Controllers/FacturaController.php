<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use App\Models\DetFactura;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FacturaController extends Controller
{
    //
    public function index(){
        $factura= Factura::all();
        return ['factura' => $factura];
    }



    public function store(Request $request){
        try {
            DB::beginTransaction();

            $fecha= Carbon::now('america/bogota');

            $factura = new Factura();

            $factura-> fecha = $fecha;
            $factura-> total = $request-> total;
            $factura-> valor_pago = $request-> valor_pago;
            $factura-> form_pago = $request-> form_pago;
            $factura-> iva = $request-> iva;
            $factura-> edo = $request-> edo;
            $factura-> id_clien = $request-> id_clien;

            $factura->save();

            $detalles = $request -> data;

            foreach($detalles as $ep => $det){

                $detalle = new DetFactura();
                $detalle -> id_fact = $factura->id;
                $detalle -> id_prod = $det['id_prod'];
                $detalle -> precio = $det['precio'];
                $detalle -> cantidad =$det['cantidad'];
                $detalle -> fecha =$det['fecha'];
                $detalle -> total = $det['precio'] * $det['cantidad'];

                $detalle->save();

            }
            
            DB::commit();            
        }catch (Excepcion $e){
            BD::rollback();
            console.log($e);
        }        

        $factura->save();
    }

    public function update(Request $request){
        $factura= Factura:: findOrFail($request->id);
        $factura-> fecha = $fecha;
        $factura-> total = $request-> total;
        $factura-> valor_pago = $request-> valor_pago;
        $factura-> form_pago = $request-> form_pago;
        $factura-> iva = $request-> iva;
        $factura-> estado = $request-> estado;

        
        $factura-> id_clien = $request-> id_clien;

        $factura->save();
    }


    public function destroy(Request $request){
        $factura= Factura:: findOrFail($request->id);
        $factura-> delete();
    }
}
