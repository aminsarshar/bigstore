<?php

namespace App\Http\Livewire\Front\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $user_name;
    public $email;
    public $phone;

    public $whatsapp;
    public $telegram;
    public $instagram;
    public $eita;

    public $image;

    public function mount()
    {
        $user = auth()->user();

        $this->name = $user->name;
        $this->user_name = $user->user_name;
        $this->email = $user->email;
        $this->phone = $user->phone;

        $this->whatsapp = $user->whatsapp;
        $this->telegram = $user->telegram;
        $this->instagram = $user->instagram;
        $this->eita = $user->eita;
    }

    protected function rules()
    {
        return [

            'name' => ['required', 'string', 'max:255'],

            'user_name' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('users', 'user_name')->ignore(auth()->id()),
            ],

            'email' => [
                'nullable',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id()),
            ],

            'phone' => ['nullable', 'max:20'],

            'whatsapp' => ['nullable', 'max:20'],

            'telegram' => ['nullable', 'max:255'],

            'instagram' => ['nullable', 'max:255'],

            'eita' => ['nullable', 'max:255'],

            'image' => ['nullable', 'image', 'max:2048'],

        ];
    }

    public function save()
    {
        $this->validate();

        $user = User::findOrFail(auth()->id());

        if ($this->image) {

            $filename = time() . '_' . uniqid() . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs(
                'profiles',
                $filename,
                'public'
            );

            $user->image = $filename;
        }

        $user->update([

            'name' => $this->name,

            'user_name' => $this->user_name,

            'email' => $this->email,

            'phone' => $this->phone,

            'whatsapp' => $this->whatsapp,

            'telegram' => $this->telegram,

            'instagram' => $this->instagram,

            'eita' => $this->eita,

            'image' => $user->image,

        ]);

        session()->flash(
            'success',
            'اطلاعات حساب با موفقیت بروزرسانی شد.'
        );
    }

    public function render()
    {
        return view('livewire.front.profile.edit-profile');
    }
}