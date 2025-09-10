<?php

namespace App\Models;

use App\Models\Product;
use App\Models\PropertyGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{

    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function propertyGroup()
    {
        return $this->belongsTo(PropertyGroup::class);
    }

}