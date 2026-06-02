<?php

namespace App\Helpers;


use App\Models\City;


class CityName
{
    public static function city_name($CityId){
        return City::findOrFail($CityId)->name;
    }
}

