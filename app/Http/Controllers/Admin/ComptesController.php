<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comptes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $comptes->usuari_id= auth()->user()->id;
        $comptes->save();
        return redirect('/dashboard/comptes');
    }

    public function delete($id)
    {
        $categoria = Comptes::find($id);
        $categoria->delete();
        return redirect('/dashboard/comptes');
    }

}
