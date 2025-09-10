<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Product;
use App\Models\Guaranty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductGuaranty extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }
}