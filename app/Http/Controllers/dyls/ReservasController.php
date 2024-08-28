<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\Cliente;
use App\Models\Configuraciones\Estado;
use App\Models\Configuraciones\Persona;
use App\Models\Configuraciones\TipoDocumento;
use App\Models\Recepcion;
use App\Models\RecepcionDetalle;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    //
    public function calendario() {
        $tipo_documentos = TipoDocumento::where('estado_id','!=',2)->get();
        $recepciones = Recepcion::where('estado_id','!=',2)->get();
        $clientes = Cliente::where('estado_id','!=',2)->get();
        $estados = Estado::whereNotIn('id',[1,2])->get();
        return view('dyls.reservas.calendario', get_defined_vars());
    }
    public function guardar(Request $request) {
        $verificacion = Recepcion::where('id',$request->recepcion_id)->first();

        if($verificacion->estado_id !== 3 && $verificacion->estado_id !== 10){
            return response()->json(["titulo" => "Alerta", "mensaje" => "Habitación no disponible (".$verificacion->estados->nombre .")", "tipo" => "warning"],200);
        }
        // if($verificacion->estado_id !== 3 && ($request->id == 0)){
        //     return response()->json(["titulo" => "Alerta", "mensaje" => "Habitación no disponible (".$verificacion->estados->nombre .")", "tipo" => "warning"],200);
        // }

        $recepcion = Recepcion::firstOrNew(['id' => $request->recepcion_id]);
        $recepcion->estado_id = $request->estado_id;
        $recepcion->save();

        // $data = RecepcionDetalle::firstOrNew(['recepcion_id' => $recepcion->id]);
        $data = RecepcionDetalle::where('id',$request->recepcion_detalle_id)->whereNotIn('estado_id',[9,8,2])->first();
        // return $request;exit;
        if(!$data){
            $data = new RecepcionDetalle();
        }

        $data->recepcion_id     = $request->recepcion_id;
        $data->cliente_id       = $request->cliente_id;
        $data->fecha_entrada    = $request->fecha_entrada;
        $data->fecha_salida     = $request->fecha_salida;
        $data->hora_entrada     = $request->hora_entrada;
        $data->hora_salida      = $request->hora_salida;
        $data->adelanto         = $request->adelanto;
        $data->saldo            = $request->saldo;
        $data->total            = $recepcion->habitaciones->precio;
        // $data->descripcion      = $request->descripcion;
        $data->estado_id        = $request->estado_id;
        $data->save();

        if(in_array($request->estado_id, [9,8,2])){
            $recepcion = Recepcion::firstOrNew(['id' => $request->recepcion_id]);
            $recepcion->estado_id = 3;
            $recepcion->save();
        }

        return response()->json(["titulo" => "Éxito", "mensaje" => "Se guardo con éxito", "tipo" => "success"],200);
    }
    public function eventos() {
        // {
        //     groupId: '999',
        //     title: 'All day Event',
        //     start: moment(new Date(), 'YYYY-MM-DD').add(-14, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
        //     color: '#161D2B',
        //     backgroundColor: '#E1E6EF',
        //     textColor: '#161D2B',
        //     borderColor: '#161D2B'
        // },
        $recepciones = Recepcion::whereIn('estado_id',[4,5,6,7])->get();
        // $recepcion_Detalle =RecepcionDetalle::whereIn('estado_id',[4,5,6,7])->get();
        $eventos = array();
        foreach ($recepciones as $key => $value) {
            // return $value->detalle;
            array_push($eventos,array(
                "id"=> $value->id,
                "groupId"=> $value->detalle->id,
                "title"=> $value->habitaciones->nombre . ' ' . $value->habitaciones->categoria->nombre,
                "start"=> $value->detalle->fecha_entrada.'T'.$value->detalle->hora_entrada ,
                "end"=> $value->detalle->fecha_salida.'T'.$value->detalle->hora_salida,
                "color"=> $value->estados->color_exadecimal,
                "backgroundColor"=> $value->estados->background_color,
                "textColor"=> $value->estados->text_color,
                "borderColor"=> $value->estados->border_color
            ));
        }
        return response()->json($eventos,200);
    }
    public function editar($id){
        $recepcion = Recepcion::find($id);
        $recepcion_detalle = RecepcionDetalle::where('recepcion_id',$id)->whereNotIn('estado_id',[9,8,2])->first();
        return response()->json(["recepcion"=>$recepcion,"recepcion_detalle"=>$recepcion_detalle],200);
    }
    public function cancelar($id){
        $recepcion = Recepcion::find($id);
        $recepcion->estado_id = 3;
        $recepcion->save();

        $recepcion_detalle = RecepcionDetalle::where('recepcion_id',$recepcion->id)->first();
        $recepcion_detalle->estado_id = 9;
        $recepcion_detalle->save();
        return response()->json(["titulo" => "Éxito", "mensaje" => "Se cancelo la reserva con éxito", "tipo" => "warning"],200);
    }
}
