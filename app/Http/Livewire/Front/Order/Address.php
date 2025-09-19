<?php

namespace App\Http\Livewire\Front\Order;

use App\Models\City;
use App\Models\Address as UserAddress;
use Livewire\Component;
use App\Models\Province;

class Address extends Component
{
    public $name;
    public $mobile;
    public $province;
    public $city;
    public $address;
    public $postal_code;
    public $provinces;
    public $cities;

    protected $rules =[
        'name' => 'required',
        'mobile' => 'required',
        'province' => 'required',
        'city' => 'required',
        'address' => 'required',
        'postal_code' => 'required',
    ];

    public function mount()
    {
        $this->provinces = Province::query()->pluck('name', 'id');
        $this->cities = collect();
    }

    public function ChangeProvince($province_id)
    {
        $this->cities = City::query()->where('province_id' , $province_id)->pluck('name', 'id');
    }


    public function submit()
    {
        $this->validate();
        $exists = UserAddress::query()->where('user_id' , auth()->user()->id)->exists();
        if($exists){
            Address::query()->create([
            'user_id' => auth()->user()->id,
            'province_id' => $this->province,
            'city_id' => $this->city,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'is_default' => false
            ]);
            toastr()->success('آدرس ایجاد شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);

        }else{
            UserAddress::query()->create([
            'user_id' => auth()->user()->id,
            'province_id' => $this->province,
            'city_id' => $this->city,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'is_default' => true
        ]);
        toastr()->success('آدرس ایجاد شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        }
    }


    public function render()
    {
        return view('livewire.front.order.address');
    }
}
