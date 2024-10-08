<?php

namespace App\Http\Controllers\dyls\puntoVenta;

use App\Http\Controllers\Controller;
use App\Models\PuntoVenta\Producto;
use App\Models\PuntoVenta\RecepcionProductoVenta;
use App\Models\PuntoVenta\Venta;
use App\Models\Recepcion;
use App\Models\RecepcionDetalle;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VentaController extends Controller
{
    //
    public function lista()
    {
        $recepciones = Recepcion::whereIn('estado_id',[5,6,7])->get();
        return view('dyls.punto-venta.venta.lista', get_defined_vars());
    }

    public function formulario($recepcion_id)
    {
        $recepcion = Recepcion::find($recepcion_id);
        $detalle = RecepcionDetalle::where('recepcion_id',$recepcion_id)->whereNotIn('estado_id',[9,8,2])->first();
        $productos = Producto::where('estado_id',1)->get();
        return view('dyls.punto-venta.venta.formulario', get_defined_vars());
    }
    public function recepcionProductosVentas(Request $request){
        $producto = Producto::find($request->producto_id);

        $venta = RecepcionProductoVenta::where('recepcion_id',$request->recepcion_id)->where('recepcion_detalle_id',$request->recepcion_detalle_id)->where('producto_id',$request->producto_id)->where('estado_id',1)->first();

        if(!$venta){
            $data = new RecepcionProductoVenta();
            $data->cantidad             = 1;
            $data->precio               = $producto->precio;
            $data->producto_id          = $producto->id;
            $data->recepcion_id         = $request->recepcion_id;
            $data->recepcion_detalle_id = $request->recepcion_detalle_id;
            $data->tipo_venta_id        = 1; // ventas al cuarto
            $data->pagar_id             = 2; // pagar despues
            $data->estado_id            = 1;
            $data->save();
            $data->producto;
            return response()->json([
                "producto"=>$data,
                "tipo"=>1
            ],200);

        }else{
            return response()->json([
                "tipo"=>2
            ],200);
        }

    }
    public function listarRecepcionProductosVentas($recepcion_id, $recepcion_detalle_id) {
        $productos = RecepcionProductoVenta::where('recepcion_id',$recepcion_id)->where('recepcion_detalle_id',$recepcion_detalle_id)->where('estado_id',1)->get();
        foreach ($productos as $key => $value) {
            $value->producto;
        }
        return response()->json(["productos"=>$productos],200);
    }

    public function guardar(Request $request) {
        try {
            $venta = RecepcionProductoVenta::find($request->id);
            $venta->cantidad = $request->cantidad;
            $venta->save();
            return response()->json(["tipo"=>200],200);
        } catch (Exception) {
            return response()->json(["titulo"=>"Alerta","texto"=>"Comuniquese con su area de TI, ocurrio un erro al momento de guardar las cantidades.","icono"=>"warning" ,"tipo"=>401],200);
        }
    }
    public function eliminar($id) {
        try {
            $venta = RecepcionProductoVenta::find($id);
            $venta->estado_id = 2;
            $venta->save();
            return response()->json(["tipo"=>200],200);
        } catch (Exception) {
            return response()->json(["titulo"=>"Alerta","texto"=>"Comuniquese con su area de TI, ocurrio un erro al momento de guardar las cantidades.","icono"=>"warning" ,"tipo"=>401],200);
        }
    }
    public function guardarPago(Request $request) {
        try {
            $venta = RecepcionProductoVenta::find($request->id);
            $venta->pagar_id = $request->pagar_id;
            $venta->save();
            return response()->json(["tipo"=>200],200);
        } catch (Exception) {
            return response()->json(["titulo"=>"Alerta","texto"=>"Comuniquese con su area de TI, ocurrio un erro al momento de guardar las cantidades.","icono"=>"warning" ,"tipo"=>401],200);
        }
    }
}
