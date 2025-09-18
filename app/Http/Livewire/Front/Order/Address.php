<?php

namespace App\Http\Livewire\Front\Order;

use Livewire\Component;

class Address extends Component
{
    public $name;
    public $mobile;
    public $province;
    public $city;
    public $address;
    public $postal_code;

    public function submit(){
        dd($this->name,$this->city);
    }


    public function render()
    {
        return view('livewire.front.order.address');
    }
}
