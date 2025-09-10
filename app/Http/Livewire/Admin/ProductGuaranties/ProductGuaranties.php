<?php

namespace App\Http\Livewire\Admin\ProductGuaranties;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductGuaranty;

class ProductGuaranties extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public $product_id;
    protected $listeners = [
        'destroyProductGuaranty',
        'refreshComponent' => '$refresh'
    ];

    public function deleteProductGuaranty($product_guaranty_id)
    {
        $this->dispatchBrowserEvent('deleteProductGuaranty',['product_guaranty_id'=>$product_guaranty_id]);
    }

    public function destroyProductGuaranty($product_guaranty_id)
    {
        $product_guaranty = ProductGuaranty::query()->find($product_guaranty_id);
        $product_id = $product_guaranty->product_id;
        $product_guaranty->delete();
        // ProductGuaranty::destroy($product_guaranty_id);
        // $product = Product::query();

        $less_price = ProductGuaranty::query()->orderBy('price', "ASC")->where('product_id', $product_id)->first();
        $product = Product::query()->find($product_id);

        if($less_price)
        {
                $product->update([
                    'price' => $less_price->price,
                    'discount' => $less_price->discount,
                    'count' => $less_price->count,
                    'max_sell' => $less_price->max_sell,
                    'guaranty_id' => $less_price->guaranty_id,
                    'is_spacial' => $less_price->is_spacial == "on" ? true : false,
                    'special_expiration' => $less_price->is_spacial == "on" ? DateManager::shamsi_to_miladi($less_price->special_expiration) : null,

                ]);



        }else{
                $product->update([
                    'price' => 0,
                    'discount' => 0,
                    'count' => 0,
                    'max_sell' => 0,
                    'guaranty_id' => null,
                    'is_spacial' => false,
                    'special_expiration' =>null,

                ]);

                $colors = [];
                $product_guaranties = ProductGuaranty::query()
                    ->where('product_id', $product_id)->where('guaranty_id', $less_price->guaranty_id)->get();
                foreach ($product_guaranties as $product_guaranty) {
                    array_push($colors, $product_guaranty->color_id);

                }

                $product->colors()->sync($colors);



        }







        $this->emit('refreshComponent');
    }
    public function render()
    {
        $product_id = $this->product_id;
        $ProductGuaranties = ProductGuaranty::query()->where('product_id' , $this->product_id)->where('main_price','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.product-guaranties.product-guaranties' , compact('ProductGuaranties' , 'product_id'));
    }
}
