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
        $comptes = Comptes::all();

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

    public function edit(Request $request, $id)
    {
        $comptes = Comptes::find($id);
        $comptes->compte=$request->input('compteEdit');
        $comptes->fuc=$request->input('fucEdit');
        $comptes->clau=$request->input('clauEdit');
        $comptes->usuari_id = auth()->user()->id;
        $comptes->save();
        return redirect('/dashboard/comptes');
    }

    public function activate($id)
    {
        $compte = DB::table('comptes')
              ->where('id', $id)
              ->update(['estat' => 1]);
        return redirect('/dashboard/comptes');
    }

    public function desactivate($id)
    {
        $compte = DB::table('comptes')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/comptes');
    }

}
