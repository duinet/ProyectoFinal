<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        return view('admin.home',compact('user'));
    }
}
