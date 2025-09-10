<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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

        Session::put('name' , $request->name);
        Session::put('mobile' , $request->mobile);
        Session::put('password' , $request->password);

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



        toastr()->success('کاربر با موفقیت ثبت نام شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect(route('home.index'));
    }
}
