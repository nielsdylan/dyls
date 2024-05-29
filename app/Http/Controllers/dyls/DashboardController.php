<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard() {
        return view('dyls.dashboard', get_defined_vars());
    }
}
