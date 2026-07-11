<?php

namespace App\Http\Livewire\Front\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;

class ProductsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public Category $category;

    public $sort = 'latest';

    public $search = '';

    protected $updatesQueryString = [
        'sort',
        'search',
    ];

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categoryIds = $this->category->getChildrenIds();

        $query = Product::with([
            'brand',
            'productGuaranties.color',
            'productGuaranties.guaranty',
        ])
        ->whereIn('category_id', $categoryIds);

        // سرچ
        if (!empty($this->search)) {

            $query->where(function ($q) {

                $q->where('title', 'like', '%' . $this->search . '%');

                // اگر این ستون را داری فعالش کن
                // ->orWhere('english_title','like','%'.$this->search.'%');

                // ->orWhere('description','like','%'.$this->search.'%');

            });

        }

        // مرتب سازی
        switch ($this->sort) {

            case 'cheap':

                $query->orderBy('price', 'asc');

                break;

            case 'expensive':

                $query->orderBy('price', 'desc');

                break;

            default:

                $query->latest();

                break;
        }

        return view('livewire.front.category.products-list', [
            'products' => $query->paginate(12)
        ]);
    }
}
