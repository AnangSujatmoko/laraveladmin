<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DataTablesColumnsBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    public function index(Request $request): View | JsonResponse
    {
        validate_permission('menus.read');

        if ($request->ajax()) {
            $rows = Menu::offset($request->start)->limit($request->length);
            $totalRecords = Menu::count();

            return DataTables::of($rows)
                ->setTotalRecords($totalRecords)
                ->setFilteredRecords($totalRecords)
                ->addColumn('actions', function ($row) {
                    return Blade::render('
                        <div class="btn-group">
                            @permission(\'users.create\')
                                <a href="{{ route(\'admin.menus.edit\', $row) }}" class="btn btn-default">Update</a>
                            @endpermission
                            @permission(\'users.delete\')
                                <button type="button" class="btn btn-danger delete-btn" data-destroy="{{ route(\'admin.menus.destroy\', $row) }}">Delete</button>
                            @endpermission
                        </div>
                    ', ['row' => $row]);
                })
                ->addColumn('created_at', function ($row) {
                    return Blade::render('
                        {{ $row->created_at->format(\'M d, Y\') }}
                    ', ['row' => $row]);
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $tableConfigs = (new DataTablesColumnsBuilder(Menu::class))
            ->setSearchable('name')
            ->setOrderable('name')
            ->setOrderable('url')
            ->setOrderable('url')
            ->setName('created_at', 'Created at')
            ->removeColumns(['updated_at'])
            ->withActions()
            ->make();

        return view('admin.menus.index', compact('tableConfigs'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menus.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required',
        ]);

        $menu->update($request->all());
        return redirect()->route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('success', 'Menu deleted successfully.');
    }
}
