<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\VerificationCode;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();
        $carts = Cart::query()->get();

        return view('auth.register' , compact('carts' , 'categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'mobile' => ['required', 'string', 'max:11', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Session::put('name', $request->name);
        Session::put('mobile', $request->mobile);
        Session::put('password', $request->password);

        $user = User::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);


        // Auth::login($user);
        // $checkSend = VerificationCode::checkTwoMinutes($request->mobile);
        // if($checkSend){
        //     $code = rand(111111,999999);
        //     VerificationCode::createVerificationCode($request->mobile , $code);
        //     // send sms


        // }



        toastr()->success('کاربر با موفقیت ثبت نام شد!', 'موفق', ['timeOut' => 5000, 'positionClass' => 'toast-top-center']);
        return redirect(route('home.index'));
    }
}
