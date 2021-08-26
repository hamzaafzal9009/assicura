<?php

namespace App\Http\Livewire\Agency;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Agents extends Component
{
    public $user;
    public $user_name;
    public $addModal = 'none';
    public $name;
    public $email;
    public $agency_id;
    public $agencies;
    use WithPagination;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
    ];
    protected $messages = [
        'name.required' => "Name is Required!",
        'email.required' => "Email is Required!",
        'email.unique' => "Email already taken!",
    ];

    public function mount($user = null)
    {
        $this->user = $user;
        if ($user == null) {
            $this->agencies = User::where('user_type', 'agency')->get();
        } else {
            $this->agency_id = $user->id;
        }
    }

    public function showAddModel()
    {
        $this->addModal = 'initial';
    }
    public function hideAddModel()
    {
        $this->addModal = 'none';
    }


    public function addAgent()
    {

        $this->validate();
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make("password");
        $user->user_type = "agent";
        $user->parent_id = $this->agency_id;
        if ($user->save()) {

            $user->syncRoles([strtolower('agent')]);
            session()->flash('addUserSuccess', 'Agent Added Successfully!');
            $this->hideAddModel();
        }else{
            session()->flash('addUserError', 'Something Went wrong!');
        }
    }

    public function render()
    {

        if ($this->user == null) {
            $agents = User::where('user_type', 'agent')
                ->orderBy('id', 'desc')->when($this->user_name, function ($query) {
                    $query->where('name', 'like', '%' . $this->user_name . '%');
                });
        } else {
            $agents = User::where('parent_id', $this->user['id'])->orderBy('id', 'desc')->when($this->user_name, function ($query) {
                $query->where('name', 'like', '%' . $this->user_name . '%');
            });
        }

        $agents = $agents->paginate(10);
        return view('livewire.agency.agents', ['users' => $agents]);
    }
}
