<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Sliders extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;

    protected $listeners = [
        'destroySlider',
        'refreshComponent' => '$refresh'
    ];

    public function deleteSlider($id)
    {
        $this->dispatchBrowserEvent('deleteSlider',['id'=>$id]);
    }

    public function destroySlider($id)
    {
        Slider::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $sliders = Slider::query()->paginate(10);
        return view('livewire.admin.sliders.sliders' , compact('sliders'));
    }
}