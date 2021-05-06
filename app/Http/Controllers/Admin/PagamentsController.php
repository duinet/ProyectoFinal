<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use App\Models\Comptes;
use App\Models\Pagaments;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PagamentsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pagaments = Pagaments::all();
        $categories = Categories::all();
        $comptes = Comptes::all();
        $cursos = Cursos::all();
        return view('admin.pagaments', compact('pagaments','categories','comptes','cursos','user'));
    }

    public function add(Request $request)
    {
        $pagaments = new Pagaments();
        $pagaments->categoria_id=$request->input('categoria');
        $pagaments->compte_id=$request->input('compte');
        $pagaments->curs_id=$request->input('curs_id');
        $pagaments->curs=$request->input('curs');
        $pagaments->pagament=$request->input('pagament');
        $pagaments->preu=$request->input('preu');
        $pagaments->descripcio=$request->input('descripcio');
        $pagaments->data_fi=$request->input('data_fi');
        $pagaments->estat=$request->input('estat');
        $pagaments->usuari_id= auth()->user()->id;
        $pagaments->save();
        return redirect('/dashboard/pagaments');
    }

    public function edit(Request $request, $id)
    {
        $pagaments = Pagaments::find($id);
        $pagaments->categoria_id=$request->input('categoriaEdit');
        $pagaments->compte_id=$request->input('compteEdit');
        $pagaments->curs_id=$request->input('curs_idEdit');
        $pagaments->curs=$request->input('cursEdit');
        $pagaments->pagament=$request->input('pagamentEdit');
        $pagaments->preu=$request->input('preuEdit');
        $pagaments->descripcio=$request->input('descripcioEdit');
        $pagaments->data_fi=$request->input('data_fiEdit');
        $pagaments->usuari_id= auth()->user()->id;
        $pagaments->save();
        return redirect('/dashboard/pagaments');
    }

    public function activate($id)
    {
        $pagament = DB::table('pagaments')
              ->where('id', $id)
              ->update(['estat' => 1]);
        return redirect('/dashboard/pagaments');
    }

    public function desactivate($id)
    {
        $pagament = DB::table('pagaments')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/pagaments');
    }

    public function delete($id)
    {
        $pagament = Pagaments::find($id);
        $pagament->delete();
        return redirect('/dashboard/pagaments');
    }
}