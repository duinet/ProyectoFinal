<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CursosController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cursos = Cursos::where('estat', '!=', 0)->get();

        return view('admin.cursos', compact('cursos','user'));
    }

    public function add(Request $request)
    {
        $cursos = new Cursos();
        $cursos->curs=$request->input('curs');
        $cursos->estat=$request->input('estat');
        $cursos->usuari_id= auth()->user()->id;
        $cursos->save();
        return redirect('/dashboard/cursos');
    }

    public function delete($id)
    {
        $curs = DB::table('cursos')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/cursos');
    }
}
