<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ListUsers extends Component
{

    public $state = [];
    public $deletedUser = null;

    public $user;
    public $showEditModal = false;

    public function addUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'User added successfull😃']);
        // session()->flash('message', 'User added successfully!');
    }

    public function addNewUserForm(){
        $this->showEditModal = false;
        $this->state = [];
        $this->dispatchBrowserEvent('showForm');
    }

    public function editUserForm(User $user){
        $this->showEditModal = true;

        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('showForm');
    }

    public function editUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
        ])->validate();

        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'User updated successfull😃']);
    }



    public function showConfirmation($userId){
        $this->deletedUser = $userId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteUser(){
        User::destroy($this->deletedUser);
        $this->dispatchBrowserEvent('hide-delete-confirmation', ['message' => 'User deleted successfull😢']);
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users', [
            'users' => $users
        ]);
    }
}
