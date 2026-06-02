<?php

namespace App\Helpers;

use App\Models\Province;

class ProvinceName
{
    public static function province_name($provinceId){
        return Province::findOrFail($provinceId)->name;
    }
}

