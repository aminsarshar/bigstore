<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyGroup extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class , 'product_property_group');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    
}
