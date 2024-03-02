<?php

namespace App\Http\Controllers\Reservas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    //
    public function calendario() {
        return view('Frontend.Reserva.Calendario', get_defined_vars());
    }
}
