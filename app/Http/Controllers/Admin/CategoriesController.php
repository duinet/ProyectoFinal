<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $Categories->usuari_id = auth()->user()->id;
        $Categories->save();
        return redirect('/dashboard/categories');
    }

    public function delete($id)
    {
        $categoria = Categories::find($id);
        $categoria->delete();
        return redirect('/dashboard/categories');
    }

}
