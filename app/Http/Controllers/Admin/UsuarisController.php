<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        $user->password= Hash::make($request->input('password'));
        $user->estat=$request->input('estat');
        $user->rol=0;

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

    public function rolSudo($id)
    {
        $usuari = DB::table('users')
              ->where('id', $id)
              ->update(['rol' => 1]);
        return redirect('/dashboard/usuaris');
    }

    public function rolNoSudo($id)
    {
        $usuari = DB::table('users')
              ->where('id', $id)
              ->update(['rol' => 0]);
        return redirect('/dashboard/usuaris');
    }

    public function delete($id)
    {
        $usuari = User::find($id);
        $usuari->delete();
        return redirect('/dashboard/usuaris');
    }
}
