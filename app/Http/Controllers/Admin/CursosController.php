<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cursos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// To use DB 
use DB;

// To use Exports
use App\Exports\CursosExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $cursos->estat=$request->input('estat');
        $cursos->usuari_id= auth()->user()->id;
        $cursos->save();
        return redirect('/dashboard/cursos');
    }

    public function edit(Request $request, $id)
    {
        $cursos = Cursos::find($id);
        $cursos->curs=$request->input('cursEdit');
        $cursos->usuari_id= auth()->user()->id;
        $cursos->save();
        return redirect('/dashboard/cursos');
    }

    public function activate($id)
    {
        $curs = DB::table('cursos')
              ->where('id', $id)
              ->update(['estat' => 1]);
        return redirect('/dashboard/cursos');
    }

    public function desactivate($id)
    {
        $curs = DB::table('cursos')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/cursos');
    }
    public function delete($id)
    {
        $curs = Cursos::find($id);
        $curs->delete();
        return redirect('/dashboard/cursos');
    }

    public function exportExel()
    {
        return Excel::download(new CursosExport, 'TaulaCursos.xlsx');
    }

    public function exportPdf()
    {
        return Excel::download(new CursosExport, 'TaulaCursos.pdf');
    }
}
