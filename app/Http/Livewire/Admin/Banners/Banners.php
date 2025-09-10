<?php

namespace App\Http\Livewire\Admin\Banners;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Banners extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners = [
        'destroyBanner',
        'refreshComponent' => '$refresh'
    ];

    public function ChangeBannerStatus($id) {
        $banner = Banner::query()->find($id);
        if($banner->status=='active'){
            $banner->update([
                'status' => 'inactive'
            ]);

        }elseif($banner->status=='inactive'){
            $banner->update([
                'status' => 'banned'
            ]);
        }else{
            $banner->update([
                'status' => 'active'
            ]);
        }
    }


    public function deleteBanner($id)
    {
        $this->dispatchBrowserEvent('deleteBanner',['id'=>$id]);
    }

    public function destroyBanner($id)
    {
        Banner::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $banners = Banner::query()->where('type','like','%'.$this->search.'%')->paginate(10);
        return view('livewire.admin.banners.banners' , compact('banners'));
    }
}