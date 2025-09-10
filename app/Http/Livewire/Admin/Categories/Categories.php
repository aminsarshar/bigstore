<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners = [
        'destroyCategory',
        'refreshComponent' => '$refresh'
    ];

    public function deleteCategory($id)
    {
        $this->dispatchBrowserEvent('deleteCategory',['id'=>$id]);
    }

    public function destroyCategory($id)
    {
        Category::destroy($id);
        $this->emit('refreshComponent');
    }


    public function render()
    {
        $categories = Category::query()->where('name','like','%'.$this->search.'%')->paginate(7);
        return view('livewire.admin.Categories.categories' , compact('categories'));
    }
}