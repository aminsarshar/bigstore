<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];




    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addresses() {
        return $this->hasMany(Address::class);
    }


    // public static function saveImage($image){
    //     if($image){
    //         $name = $image->hashName();
    //         $smallImage = Image::make($image->getRealPath());
    //         $bigImage = Image::make($image->getRealPath());
    //         $smallImage->resize(256,256, function ($constraint){
    //             $constraint->aspectRatio();
    //         });

    //         Storage::disk('local')->put('users/small/'.$name, (string) $smallImage->encode('png',90));
    //         Storage::disk('local')->put('users/big/'.$name, (string) $bigImage->encode('png',90));
    //         return $name;
    //     }else{
    //         return "";
    //     }
    //  }

    //  public static function createUser($request)
    //  {
    //      User::query()->create([
    //          'name'=>$request->input('name'),
    //          'email'=>$request->input('email'),
    //          'mobile'=>$request->input('mobile'),
    //          'password'=> Hash::make($request->input('password')) ,
    //          'image'=>self::saveImage($request->image),
    //      ]);
    //  }
}
