<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    public function Categoryparent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->withDefault(['name' => "---"]);
    }

    public function Categorychild()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')
            ->withTrashed()
            ->withDefault(['name'=>"---"]);
    }

    public function childCategory()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function getCategories()
    {
        $array = [];
        $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
        foreach ($categories as $category1){
            $array[$category1->id]=$category1->name;
            foreach ($category1->childCategory as $category2){
                $array[$category2->id]= ' - ' . $category2->name;
                foreach ($category2->childCategory as $category3){
                    $array[$category3->id]= ' - - ' . $category3->name;
                }
            }
        }

        return $array;
    }



    protected static function boot()
    {
        parent::boot();
        self::deleting(function($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                if($category->isForceDeleting()){
                    $cat->forcedelete();
                }else{
                    $cat->delete();
                }
            }
        });

        self::restoring(function ($category){
            foreach ($category->childCategory()->withTrashed()->get() as $cat){
                $cat->restore();
            }
        });
    }


}