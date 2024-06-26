<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\Cliente;
use App\Models\Configuraciones\Persona;
use App\Models\Configuraciones\TipoDocumento;
use App\Models\Recepcion;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    //
    public function calendario() {
        $tipo_documentos = TipoDocumento::where('estado_id','!=',2)->get();
        $recepciones = Recepcion::where('estado_id',3)->get();
        return view('dyls.reservas.calendario', get_defined_vars());
    }
    public function guardar(Request $request) {
        return $request;
        $persona = new Persona();
        $persona->apellido_paterno  = $request->apellido_paterno;
        $persona->apellido_materno  = $request->apellido_materno;
        $persona->nro_documento     = $request->nro_documento;
        $persona->documento_id      = $request->documento_id;
        $persona->nombres           = $request->nombres;
        $persona->telefono          = $request->telefono;
        $persona->save();

        $data = new Cliente();
        $data->codigo       = 'C'.$request->nro_documento;
        $data->persona_id   = $persona->id;
        $data->save();

    }
    public function habitacion($id) {
        return $id;
    }
}
