<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Pagaments;
use App\Models\PersonesPagament;

class PlantillaController extends Controller
{

    public function welcome(){
        $categories = Categories::all();
        return view('welcome', compact('categories'));
    }

    public function tipopagos($id){
        $categories = Categories::all();
        Pagaments::disablePagaments();
        $pagaments = Pagaments::where('estat', '!=', 0)
                                ->where('categoria_id', '=', $id)
                                ->get();

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
    public function personapago(Request $request){
        $personapago = new PersonesPagament();
        $personapago->descripcio=$request->input('descripcioPersona');
        $personapago->save();
        return redirect('/');
    }
}
