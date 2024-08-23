<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Recepcion;
use App\Models\RecepcionDetalle;
use Illuminate\Http\Request;

class VerificacionSalidaController extends Controller
{
    //
    public function lista()
    {
        $recepciones = Recepcion::whereNotIn('estado_id',[2,3])->get();
        return view('dyls.verificacion-salida.lista', get_defined_vars());
    }
    public function formulario($id)
    {
        $recepcion = Recepcion::find($id);
        // $recepcion_detalle = RecepcionDetalle::where()->first->();
        // return $recepcion;
        return view('dyls.verificacion-salida.formulario', get_defined_vars());
    }
}
