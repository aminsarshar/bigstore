<?php

use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $last_name;
    public $email;
    public $phone;

    public $whatsapp;
    public $telegram;
    public $instagram;
    public $eita;

    public $image;

    public $current_password;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.front.profile.edit-profile');
    }
}