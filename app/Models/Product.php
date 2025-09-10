<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Guaranty;
use App\Models\Property;
use App\Models\ImageGallery;
use App\Models\PropertyGroup;
use App\Models\ProductGuaranty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class , 'taggable');
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function productguaranty()
    {
        return $this->belongsTo(ProductGuaranty::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class , 'color_product');
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function propertyGroups()
    {
        return $this->belongsToMany(PropertyGroup::class , 'product_property_group');
    }

    public function galleries()
    {
        return $this->hasMany(ImageGallery::class);
    }

    public function productGuaranties()
    {
        return $this->hasMany(ProductGuaranty::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');

    }

    public function Subcomments()
    {
        return $this->morphMany(Comment::class , 'commentable')->where('status' , 'approved');

    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
