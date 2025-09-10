<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PropertyGroup;
use App\Http\Controllers\Controller;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property_groups.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->where('parent_id' , 0)->pluck('name' , 'id');
        return view('admin.property_groups.create' , compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $property_group = PropertyGroup::query()->create([
            'title' => $request->title,
            'category_id' => $request->category_id,


        ]);


        toastr()->success(' گروه ویژگی با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000]);
        return redirect(route('property_groups.index'));
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
        $categories = Category::query()->where('parent_id' , 0)->pluck('name' , 'id');
        $property_group = PropertyGroup::query()->findOrFail($id);
        return view('admin.property_groups.edit' , compact('categories' , 'property_group'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property_group = PropertyGroup::findOrFail($id);

        $property_group->update([
            'title' => $request->title,
            'category_id' => $request->category_id,


        ]);


        toastr()->success('گروه ویژگی با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('property_groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}