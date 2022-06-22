<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Audit;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $category = count(Category::where('status', '0')->get());
        $users = User::all();

        $user = Auth::user();
        $audit = new Audit();
        $audit->audit_description="{$audit->name} logged in to the Admin Dashboard";
        $audit->activity="An Admin: {$audit->name} logged in to the Admin Dashboard";
        $audit->user_id=$user->id;
        $audit->save();

        return view('admin.dashboard', compact('category', 'users'));
    }
}
