<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comptes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ComptesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $comptes = Comptes::where('estat', '!=', 0)->get();

        return view('admin.comptes', compact('comptes','user'));
    }

    public function add(Request $request)
    {
        $comptes = new Comptes();
        $comptes->compte=$request->input('compte');
        $comptes->fuc=$request->input('fuc');
        $comptes->clau=$request->input('clau');
        $comptes->estat=$request->input('estat');
        $comptes->usuari_id= auth()->user()->id;
        $comptes->save();
        return redirect('/dashboard/comptes');
    }

    public function delete($id)
    {
        $compte = DB::table('comptes')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/comptes');
    }

}
