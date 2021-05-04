<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class UsuarisController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::all();

        return view('admin.usuaris', compact('users','user'));
    }

    public function add(Request $request)
    {
        $user = new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        //$user->usuari_id = auth()->user()->id;
        $user->estat=$request->input('estat');

        $user->save();
        return redirect('/dashboard/usuaris');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->name=$request->input('nameEdit');
        $user->email=$request->input('emailEdit');
        $user->save();
        return redirect('/dashboard/usuaris');
    }

    public function activate($id)
    {
        $usuari = DB::table('users')
              ->where('id', $id)
              ->update(['estat' => 1]);
        return redirect('/dashboard/usuaris');
    }

    public function desactivate($id)
    {
        $usuari = DB::table('users')
              ->where('id', $id)
              ->update(['estat' => 0]);
        return redirect('/dashboard/usuaris');
    }
}
