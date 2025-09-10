<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $image = '';
        if (!empty($file)) {
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/sliders', $image);
        }
        Slider::query()->create([
            'image' => $image,
            'url' => $request->url,

        ]);

        toastr()->success('اسلایدر با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000, 'positionClass' => 'toast-top-center']);
        return redirect(route('sliders.index'));
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
        $sliders = Slider::query()->find($id);
        return view('admin.sliders.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);
        $file = $request->file('image');
        $image = '';

        if (!empty($file)) {
            if (file_exists('admin/images/sliders/' . $slider->image)) {
                unlink('admin/images/sliders/' . $slider->image);
            }
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/sliders/', $image);
        } else {
            $image = $slider->image;
        }

        $slider->update([
            'image' => $image,
            'name' => $request->name,
            'link' => $request->link,

        ]);
        toastr()->success('اسلایدر با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000, 'positionClass' => 'toast-top-center']);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}