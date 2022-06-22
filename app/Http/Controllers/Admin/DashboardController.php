<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $category=count(Category::where('status','0')->get());
        $users=User::all();
       
        return view('admin.dashboard', compact('category','users'));
    }
}
