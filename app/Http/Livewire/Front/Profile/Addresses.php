<?php

namespace App\Http\Livewire\Front\Profile;

use Livewire\Component;
use App\Models\Address;
use App\Models\Province;
use App\Models\City;

class Addresses extends Component
{
    public $provinces = [];
    public $cities = [];

    public $showForm = false;
    public $editingId = null;

    public $name;
    public $mobile;
    public $province_id;
    public $city_id;
    public $postal_code;
    public $address;

    protected $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'province_id' => 'required',
        'city_id' => 'required',
        'postal_code' => 'required',
        'address' => 'required|min:10',
    ];

    public function mount()
    {
        $this->provinces = Province::all();
        $this->cities = [];
    }

    public function updatedProvinceId($value)
    {
        $this->cities = City::where('province_id', $value)->get();
        $this->city_id = null;
    }

    public function showCreateForm()
    {
        $this->resetForm();

        $this->showForm = true;

        $this->editingId = null;
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'mobile',
            'province_id',
            'city_id',
            'postal_code',
            'address',
        ]);

        $this->cities = [];
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'postal_code' => $this->postal_code,
            'address' => $this->address,
        ];

        if ($this->editingId) {

            Address::where('user_id', auth()->id())
                ->findOrFail($this->editingId)
                ->update($data);

            session()->flash('success', 'آدرس ویرایش شد.');

        } else {

            $data['user_id'] = auth()->id();
            $data['is_default'] = 0;

            Address::create($data);

            session()->flash('success', 'آدرس ثبت شد.');
        }

        $this->resetForm();

        $this->editingId = null;

        $this->showForm = false;
    }

    public function edit($id)
    {
        $address = Address::where('user_id', auth()->id())
            ->findOrFail($id);

        $this->editingId = $id;

        $this->showForm = true;

        $this->name = $address->name;
        $this->mobile = $address->mobile;
        $this->province_id = $address->province_id;

        $this->cities = City::where('province_id', $address->province_id)->get();

        $this->city_id = $address->city_id;
        $this->postal_code = $address->postal_code;
        $this->address = $address->address;
    }

    public function makeDefault($id)
    {
        Address::where('user_id', auth()->id())
            ->update([
                'is_default' => 0
            ]);

        Address::where('user_id', auth()->id())
            ->findOrFail($id)
            ->update([
                'is_default' => 1
            ]);
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent('confirm-delete-address', [
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        Address::where('user_id', auth()->id())
            ->findOrFail($id)
            ->delete();

        $this->dispatchBrowserEvent('address-deleted');
    }

    public function render()
    {
        return view('livewire.front.profile.addresses', [
            'addresses' => auth()->user()
                ->addresses()
                ->with(['province', 'city'])
                ->latest()
                ->get()
        ]);
    }
}
