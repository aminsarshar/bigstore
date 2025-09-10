<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.colors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::query()->create([
            'name' => $request->name,
            'code_color' => $request->code_color,

        ]);

        toastr()->success('رنگ با موفقیت ایجاد شد !', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect(route('colors.index'));
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
        $colors = Color::query()->find($id);
        return view('admin.colors.edit' , compact('colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::findOrFail($id);
        $color->update([
            'name' => $request->name,
            'code_color' => $request->code_color,

        ]);
        toastr()->success('رنگ با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('colors.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}