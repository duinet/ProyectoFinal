<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// To use DB 
use DB;

// To use Exports
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CategoriesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $categories = Categories::all();

        return view('admin.categories', compact('categories','user'));
    }

    public function add(Request $request)
    {
        $Categories = new Categories();
        $Categories->categoria=$request->input('Categoria');
        $Categories->estat=$request->input('estat');
        $Categories->usuari_id = auth()->user()->id;
        $Categories->save();
        return redirect('/dashboard/categories');
    }

    public function edit(Request $request, $id)
    {
        $Categories = Categories::find($id);
        $Categories->categoria=$request->input('CategoriaEdit');
        $Categories->usuari_id = auth()->user()->id;
        $Categories->save();
        return redirect('/dashboard/categories');
    }

    public function activate($id)
    {
        $categoria = DB::table('categories')
              ->where('id', $id)
              ->update(['estat' => 1]);
        return redirect('/dashboard/categories');
    }

    public function desactivate($id)
    {
        $categoria = DB::table('categories')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/categories');
    }

    public function delete($id)
    {
        $categoria = Categories::find($id);
        $categoria->delete();
        return redirect('/dashboard/categories');
    }

    public function exportExel()
    {
        return Excel::download(new CategoriesExport, 'TaulaCategories.xlsx');
    }

    public function exportPdf()
    {
        return Excel::download(new CategoriesExport, 'TaulaCategories.pdf');
    }
}
