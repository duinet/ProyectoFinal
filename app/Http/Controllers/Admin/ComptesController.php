<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comptes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


use DB;

use App\Exports\ComptesExport;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

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

        $validateData = Validator::make($request->all(), [
            'fuc' => 'numeric'
        ]);

        if($validateData->fails()){
            return redirect()->back()->withErrors(["Error al afegir el nou compte (Revisa el formulari)."]);
        }else{
            $comptes->compte=$request->input('compte');
            $comptes->fuc=$request->input('fuc');
            $comptes->clau=$request->input('clau');
            $comptes->estat=$request->input('estat');
            $comptes->usuari_id= auth()->user()->id;
            $comptes->save();
            return redirect('/dashboard/comptes');
        }
    }

    public function edit(Request $request, $id)
    {
        $comptes = Comptes::find($id);

        $validateData = Validator::make($request->all(), [
            'fucEdit' => 'numeric'
        ]);

        if($validateData->fails()){
            return redirect()->back()->withErrors(["Error al editar el compte."]);
        }else{
            $comptes->compte=$request->input('compteEdit');
            $comptes->fuc=$request->input('fucEdit');
            $comptes->clau=$request->input('clauEdit');
            $comptes->usuari_id = auth()->user()->id;
            $comptes->save();
            return redirect('/dashboard/comptes');
        }

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
    public function delete($id)
    {
        $compte = Comptes::find($id);
        $compte->delete();
        return redirect('/dashboard/comptes');
    }

    public function exportExel()
    {
        return Excel::download(new ComptesExport, 'TaulaComptes.xlsx');
    }

    public function exportPdf()
    {
        $data = Comptes::all();
        view()->share('comptes',$data);
        $pdf = PDF::loadView('admin.exportspdf.comptes_pdf', $data);
        return $pdf->download('TaulaComptes.pdf');
    }

}
