<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comptes;
use App\Models\Pagaments;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); 
        return view('admin.home',compact('user'));
    }
}
