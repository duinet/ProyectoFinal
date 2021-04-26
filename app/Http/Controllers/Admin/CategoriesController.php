<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.categories', compact('user'));
    }
}
