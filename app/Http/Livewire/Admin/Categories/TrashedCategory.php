<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class TrashedCategory extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;

   
    protected $listeners = [
        'forceDestroyCategory',
        'refreshComponent' => '$refresh'
    ];

    public function forceDeleteCategory($id)
    {
        $this->dispatchBrowserEvent('forceDeleteCategory',['id'=>$id]);
    }

    public function forceDestroyCategory($id)
    {
        Category::query()->withTrashed()->find($id)->forceDelete();
        $this->emit('refreshComponent');
    }

    public function restoreCategory($id)
    {
        Category::query()->withTrashed()->find($id)->restore();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $categories = Category::query()->where('deleted_at' , '!=' , null)->onlyTrashed()->where('name','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.categories.trashed-category' , compact('categories'));
    }
}
