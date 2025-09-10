<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guaranty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuarantyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.guaranties.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guaranties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Guaranty::query()->create([
            'name' => $request->name,

        ]);

        toastr()->success('گارانتی با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect(route('guaranties.index'));
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
        $guaranties = Guaranty::query()->find($id);
        return view('admin.guaranties.edit' , compact('guaranties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guaranty = Guaranty::findOrFail($id);
        $guaranty->update([
            'name' => $request->name,

        ]);
        toastr()->success('گارانتی با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('guaranties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}