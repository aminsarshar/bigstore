<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VerifyMobileController extends Controller
{
    public function verify()
    {
        return view('auth.verify_mobile');
    }

    public function VerifyCode(Request $request)
    {

        $code = (int) implode('', $request->code);
        $mobile = Session::get('mobile');
        $check = VerificationCode::checkVerificationCode($mobile, $code);
        if ($check) {

            $user = User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect()->route('home.index');
        }else{
            return redirect()->back()->with('message' , 'کد صحیح نیست');
        }

    }

}