<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $image = '';
        if(!empty($file)){
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/brands' , $image);
        }
        Brand::query()->create([
            'image'=>$image,
            'name' => $request->name,
            'link' => $request->link,
            'slug' => Str::slug($request->name),


        ]);

        toastr()->success('برند با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect(route('brands.index'));
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
        $brands = Brand::query()->find($id);
        return view('admin.brands.edit' , compact('brands'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);
        $file = $request->file('image');
        $image = '';

        if(!empty($file)){
            if(file_exists('admin/images/brands/'.$brand->image)){
                unlink('admin/images/brands/'.$brand->image);
            }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/brands/',$image);
        }else{
            $image = $brand->image;
        }

        $brand->update([
            'image' =>$image,
            'name' => $request->name,
            'link' => $request->link,

        ]);
        toastr()->success('برند با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}