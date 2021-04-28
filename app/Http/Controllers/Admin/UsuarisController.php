<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarisController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::all();

        return view('admin.usuaris', compact('users','user'));
    }
}
