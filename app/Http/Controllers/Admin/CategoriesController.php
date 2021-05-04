<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

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

    // public function showDataEdit($id)
    // {
    //     $categoriaShow = Categories::find($id);
    //     $array = array($categoriaShow->categoria, $categoriaShow->estat);
    //     return $array;
    // }

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

}
