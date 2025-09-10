<?php

namespace App\Models;

use App\Models\User;
use App\Models\Color;
use App\Models\Product;
use App\Models\Guaranty;
use App\Models\ProductGuaranty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }


    public function guaranty()
    {
        return $this->belongsTo(Guaranty::class);
    }

    public function ProductPrice($product_id, $color_id, $guaranty_id)
    {
        $product = ProductGuaranty::query()
            ->where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->where('guaranty_id', $guaranty_id)
            ->first();

        if ($product) {
            return $product->price;
        }
    }
}
