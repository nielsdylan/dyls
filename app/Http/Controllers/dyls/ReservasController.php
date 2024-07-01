<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\Cliente;
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
        $recepciones = Recepcion::where('estado_id',3)->get();
        $clientes = Cliente::where('estado_id','!=',2)->get();
        return view('dyls.reservas.calendario', get_defined_vars());
    }
    public function guardar(Request $request) {

        $verificacion = Recepcion::where('id',$request->recepcion_id)->first();

        if($verificacion->estado_id !== 3){
            return response()->json(["titulo" => "Alerta", "mensaje" => "Habitación no disponible (".$verificacion->estados->nombre .")", "tipo" => "warning"],200);
        }

        $persona = new Persona();
        $persona->apellido_paterno  = $request->apellido_paterno;
        $persona->apellido_materno  = $request->apellido_materno;
        $persona->nro_documento     = $request->nro_documento;
        $persona->documento_id      = $request->documento_id;
        $persona->nombres           = $request->nombres;
        $persona->telefono          = $request->telefono;
        $persona->save();

        $cliente = new Cliente();
        $cliente->codigo       = 'C'.$request->nro_documento;
        $cliente->persona_id   = $persona->id;
        $cliente->save();

        $recepcion = Recepcion::firstOrNew(['id' => $request->recepcion_id]);
        $recepcion->estado_id = 4;
        $recepcion->save();

        $data = RecepcionDetalle::firstOrNew(['recepcion_id' => $request->recepcion_id]);
        $data->recepcion_id     = $request->recepcion_id;
        $data->cliente_id       = $cliente->id;
        $data->fecha_entrada    = $request->fecha_entrada;
        $data->fecha_salida     = $request->fecha_salida;
        $data->hora_entrada     = $request->hora_entrada;
        $data->hora_salida      = $request->hora_salida;
        $data->adelanto         = $request->adelanto;
        $data->saldo            = $request->saldo;
        $data->total            = $recepcion->habitaciones->precio;
        // $data->descripcion      = $request->descripcion;
        $data->estado_id        = 4;
        $data->save();
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
        $recepciones = Recepcion::whereIn('estado_id',[4,5])->get();
        $eventos = array();
        foreach ($recepciones as $key => $value) {
            array_push($eventos,array(
                "id"=> $value->id,
                // "groupId"=> $value->id,
                "title"=> $value->habitaciones->nombre . ' ' . $value->habitaciones->categoria->nombre,
                "start"=> '2024-06-27T05:30:00.000Z',
                "end"=> '2024-06-27T05:30:00.000Z',
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
        $recepcion_detalle = RecepcionDetalle::where('recepcion_id',$id)->first();
        return response()->json(["recepcion"=>$recepcion,"recepcion_detalle"=>$recepcion_detalle],200);
    }
}
