<?php

namespace App\Http\Controllers\Pagos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
    {
        return view('Pagos.pago');
    }
}
