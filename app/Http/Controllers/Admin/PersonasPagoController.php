<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PersonesPagament;

class PersonasPagoController extends Controller
{
    public function index(){
        $personas = PersonesPagament::all();
        return view('admin.personaspago', compact('personas'));
    }
    

    public function delete($id)
    {
        $personas = PersonesPagament::find($id);
        $personas->delete();
        return redirect('/dashboard/personaspago');
    }
} 
