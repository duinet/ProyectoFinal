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
        $categories = Categories::where('estat', '!=', 0)->get();

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

    public function delete($id)
    {
        $categoria = DB::table('categories')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/categories');
    }

}
