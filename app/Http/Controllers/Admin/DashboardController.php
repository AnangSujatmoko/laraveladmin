<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\Role;
use App\Models\User;
use App\Models\Menu;

class DashboardController extends Controller
{
    public function index(): View
    {
        validate_permission('dashboard.read');

        // Menghitung total roles, users, dan menus
        $totalRoles = Role::count();
        $totalUsers = User::count();
        $totalMenus = Menu::count();

        // Mengirim data ke view
        return view('admin.dashboard.index', compact('totalRoles', 'totalUsers', 'totalMenus'));
    }
}
