<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\Users\CreateRequestUser;

class UserController extends Controller
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');

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
            $file->move('admin/images/users' , $image);
        }
        User::query()->create([
            'image'=>$image,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'instagram' => $request->instagram,

        ]);

        toastr()->success('کاربر با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000]);
        return redirect(route('users.index'));
        // Display an error toast with no title

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $file = $request->file('image');
        $image = '';

        // if(!empty($file)){
            // if(file_exists('admin/images/users/'.$user->image)){
            //     unlink('admin/images/users/'.$user->image);
            // }
            $image = time().".".$file->getClientOriginalExtension();
            $file->move('admin/images/users/',$image);
        // }else{
        //     $image = $user->image;
        // }

        $user->update([
            'image' =>$image,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'instagram' => $request->instagram,

        ]);
        toastr()->success('کاربر با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000]);
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        $user = User::findOrFail($id);
        if($user->image == null){
        $user = User::findOrFail($id);

            $imageUser = $user->image;
            toastr()->success('کاربر با موفقیت حذف شد!', 'موفق', ['timeOut' => 5000]);
            $user->destroy($id);
            return redirect()->route('users.index');
        }else{
            $user = User::findOrFail($id);
            $imageUser = $user->image;
            unlink('admin/images/users/'.$imageUser);
            toastr()->success('کاربر با موفقیت حذف شد!', 'موفق', ['timeOut' => 5000]);
            $user->destroy($id);
            return redirect()->route('users.index');
        }

    }

    public function CreateUserRole($id)
    {
        $user = User::query()->findOrFail($id);
        $roles = Role::query()->get();
        return view('admin.users.user_roles' , compact('user' , 'roles'));

    }


    public function StoreUserRole(Request $request , $id)
    {
        $user = User::query()->findOrFail($id);
        $user->syncRoles($request->roles);
        toastr()->success('نقش به کاربر اختصاص داده شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('users.index' , compact('user'));


    }
}