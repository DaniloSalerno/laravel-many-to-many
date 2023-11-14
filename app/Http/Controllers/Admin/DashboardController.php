<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_projects = Project::all()->count();
        $total_users = User::all()->count();
        $total_types = Type::all()->count();
        return view('admin.dashboard', compact('total_projects', 'total_users', 'total_types'));
    }
}
