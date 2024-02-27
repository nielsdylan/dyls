<?php

namespace App\Http\Controllers\Backend\Configuraciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatosEmpresaController extends Controller
{
    //
    public function datosEmpresa() {
        return view('Frontend.Configuraciones.DatosEmpresa', get_defined_vars());
    }
}
