<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::query()->create([
            'name' => $request->name,
        ]);
        toastr()->success('نقش با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000]);
        return redirect(route('roles.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::query()->find($id);
        return view('admin.roles.edit' , compact('role'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Role::query()->find($id);

        $roles->update([
            'name' => $request->name,
        ]);
        toastr()->success('نقش با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000]);
        return redirect(route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = Role::findOrFail($id);
        $roles->destroy($id);
        toastr()->success('کاربر با موفقیت حذف شد!', 'موفق', ['timeOut' => 5000]);
        return redirect()->route('users.index');
    }
}