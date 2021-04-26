<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Pagaments;

class PlantillaController extends Controller
{

    public function welcome(){
        $categories = Categories::all();
        return view('welcome', compact('categories'));
    }

    public function tipopagos(){
        $categories = Categories::all();
        $pagaments = Pagaments::where('estat', '!=', 0)->get();

        $arrayCurs = [];
        foreach($pagaments as $pagament){
            array_push($arrayCurs, $pagament->curs);
        }
        $arrayCurs = array_unique($arrayCurs);

        return view('pagos.tipopagos', compact('categories','arrayCurs', 'pagaments'));
    }

    public function pago($id){
        $categories = Categories::all();
        $pagament = Pagaments::Find($id);
        return view('pagos.pago', compact('categories', 'pagament'));
    }


}
