<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class VerificationCode extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function checkTwoMinutes($entry)
    {
        $check = self::query()->where('mobile', $entry)->orWhere('email', $entry)->where('created_at', '>', Carbon::now()->subMinute(2))->frist();

        if($check){
            return true;

        }else{
            return false;
        }
    }

    public static function createVerificationCode($entry , $code){
        self::query()->create([
            'mobile' => $entry,
            'code' => $code,
        ]);

    }

    public static function checkVerificationCode($entry , $code){
        $check = self::query()->where('mobile', $entry)->orWhere('email', $entry)->where('code' , $code)->frist();

        if($check){
            return true;

        }else{
            return false;
        }
    }
}