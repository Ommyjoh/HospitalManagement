<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $state = [];
    public $deletedUser = null;

    public $user;
    public $showEditModal = false;
    public $searchTerm;
    public $photo;

    public function addUser(){
        $validatedData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'photo' => 'image|max:1024',
        ])->validate();

        $validatedData['password'] = bcrypt($validatedData['password']);

        if($this->photo){
            $this->validate([
                'photo' => 'image|max:1024',
            ]);
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        User::create($validatedData);
        $this->dispatchBrowserEvent('hideForm', ['message' => 'User added successfull']);
        // session()->flash('message', 'User added successfully!');
    }

    public function addNewUserForm(){
        $this->showEditModal = false;
        $this->reset();
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

        if($this->photo){
            $this->validate([
                'photo' => 'image|max:1024',
            ],
            [
            'photo.image' => 'Heeeey'
            ]
        );
            $validatedData['avatar'] = $this->photo->store('/', 'avatars');
        }

        $this->user->update($validatedData);
        $this->photo = '';
        $this->dispatchBrowserEvent('hideForm', ['message' => 'User updated successfull']);
    }

    public function showConfirmation($userId){ 
        $this->deletedUser = $userId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteUser(){
        User::destroy($this->deletedUser);
        $this->dispatchBrowserEvent('hide-delete-confirmation', ['message' => 'User deleted successfull']);
    }

    public function render()
    {
        $users = User::query()
        ->where('name', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('email', 'like', '%'.$this->searchTerm.'%')
        ->latest()->paginate(15);
        return view('livewire.admin.users.list-users', [
            'users' => $users
        ]);
    }
}
