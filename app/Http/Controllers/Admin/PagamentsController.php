<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use App\Models\Comptes;
use App\Models\Pagaments;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $pagaments->categoria=$request->input('Categoria');
        $pagaments->usuari_id= auth()->user()->id;
        $pagaments->save();
        return redirect('/dashboard/pagaments');
    }

    public function delete($id)
    {
        $pagament = Pagaments::find($id);
        $pagament->delete();
        return redirect('/dashboard/pagaments');
    }

}
