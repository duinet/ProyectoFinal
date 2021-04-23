<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoPagosController extends Controller
{
    public function index()
    {
        return view('Pagos.tipopagos');
    }
}
