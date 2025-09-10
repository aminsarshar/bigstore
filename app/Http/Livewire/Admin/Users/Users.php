<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search;
    public function ChangeUserStatus($id) {
        $user = User::query()->find($id);
        if($user->status=='active'){
            $user->update([
                'status' => 'inactive'
            ]);

        }elseif($user->status=='inactive'){
            $user->update([
                'status' => 'banned'
            ]);
        }else{
            $user->update([
                'status' => 'active'
            ]);
        }
    }
    

    protected $listeners = [
        'destroyUser',
        'refreshComponent' => '$refresh'
    ];

    public function deleteUser($id)
    {
        $this->dispatchBrowserEvent('deleteUser',['id'=>$id]);
    }

    public function destroyUser($id)
    {
        User::destroy($id);
        $this->emit('refreshComponent');
    }

    public function render()
    {
        $users = User::query()->
        where('name','like','%'.$this->search.'%')->
        OrWhere('mobile','like','%'.$this->search.'%')->
        OrWhere('email','like','%'.$this->search.'%')
        ->paginate(10);
        return view('livewire.admin.Users.users' , compact('users'));
    }
}