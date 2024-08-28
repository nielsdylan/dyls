<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\Cliente;
use App\Models\Configuraciones\Habitacion;
use App\Models\Configuraciones\TipoPago;
use App\Models\PuntoVenta\RecepcionProductoVenta;
use App\Models\Recepcion;
use App\Models\RecepcionDetalle;
use App\Models\Salida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificacionSalidaController extends Controller
{
    //
    public function lista()
    {
        $recepciones = Recepcion::whereIn('estado_id',[4,5,6,7])->get();
        return view('dyls.verificacion-salida.lista', get_defined_vars());
    }
    public function formulario($id)
    {
        $recepcion = Recepcion::find($id);
        $recepcion_detalle = RecepcionDetalle::where('recepcion_id',$id)->first();
        $cliente = Cliente::find($recepcion_detalle->cliente_id);
        $fecha_entrada = Carbon::createFromFormat('Y-m-d', $recepcion_detalle->fecha_entrada);
        $fecha_salida = Carbon::createFromFormat('Y-m-d', $recepcion_detalle->fecha_salida);
        $total_dias = $fecha_entrada->diffInDays($fecha_salida);
        $ventas = RecepcionProductoVenta::where('estado_id',1)->where('recepcion_id',$id)->where('recepcion_detalle_id',$recepcion_detalle->id)->get();
        $tipo_pago = TipoPago::where('estado_id',1)->get();
        return view('dyls.verificacion-salida.formulario', get_defined_vars());
    }
    public function guardar(Request $request){

        $cliente = Cliente::find($request->cliente_id);
        $habitacion = Habitacion::find($request->habitacion_id);
        $mora_penalidad = $request->mora_penalidad;
        $recepcion_detalle = RecepcionDetalle::find($request->recepcion_detalle_id);
        $tipo_pago = TipoPago::find($request->tipo_pago);

        $salida = Salida::firstOrNew(['habitacion_id' => $request->habitacion_id, 'recepcion_detalle_id'=>$request->recepcion_detalle_id]);
        // $salida = new Salida();
        $salida->habitacion_id = $request->habitacion_id;
        $salida->cliente_id = $request->cliente_id;
        $salida->recepcion_detalle_id = $request->recepcion_detalle_id;
        $salida->tipo_pago_id = $request->tipo_pago;
        $salida->mora_penalidad = $request->mora_penalidad;
        $salida->precio_habitacion = $recepcion_detalle->total;
        $salida->fecha_entrada = $recepcion_detalle->fecha_entrada;
        $salida->fecha_salida = $recepcion_detalle->fecha_salida;
        $salida->hora_entrada = $recepcion_detalle->hora_entrada;
        $salida->hora_salida = $recepcion_detalle->hora_salida;
        $salida->estado_id = 1;
        $salida->save();

        $recepcion = Recepcion::find($recepcion_detalle->recepcion_id);
        $recepcion->estado_id = 10;
        $recepcion->save();

        $recepcion_detalle = RecepcionDetalle::find($request->recepcion_detalle_id);
        $recepcion_detalle->estado_id = 8;
        $recepcion_detalle->save();

        return response()->json(["data"=>$request->all(), "titulo"=>"Éxito","mensaje"=>"Se guardo con éxito","tipo"=>"success"],200);
    }
}
