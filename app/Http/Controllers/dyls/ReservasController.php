<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\TipoDocumento;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    //
    public function calendario() {
        $tipo_documentos = TipoDocumento::where('estado_id','!=',2)->get();
        return view('dyls.reservas.calendario', get_defined_vars());
    }
}
