<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cursos = Cursos::all();

        return view('admin.cursos', compact('cursos','user'));
    }

    public function add(Request $request)
    {
        $cursos = new Cursos();
        $cursos->curs=$request->input('curs');
        $cursos->usuari_id= auth()->user()->id;
        $cursos->save();
        return redirect('/dashboard/cursos');
    }

    public function delete($id)
    {
        $curs = Cursos::find($id);
        $curs->delete();
        return redirect('/dashboard/cursos');
    }
}
