<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\ImageGallery;
use Livewire\WithPagination;

class Imagegalleries extends Component
{

    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $product;

    protected $listeners = [
        'destroyImageGallery',
        'refreshComponent' => '$refresh'
    ];

    public function deleteImageGallery($id)
    {
        $this->dispatchBrowserEvent('deleteImageGallery',['id'=>$id]);
    }

    public function destroyImageGallery($id)
    {
        $ImageGallery = ImageGallery::query()->find($id);
        $path = public_path(). "\admin\images\ImageGalleries/".$ImageGallery->image;
        unlink($path);
        $ImageGallery->delete();
        $this->emit('refreshComponent');
    }
    public function render()
    {
        $imagegalleries = ImageGallery::query()->where('product_id' , $this->product->id)->orderBy('position' , 'DESC')->paginate(10);
        return view('livewire.admin.products.imagegalleries' , compact('imagegalleries'));
    }

}