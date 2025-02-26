<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserForm extends Component
{
    public $user_id, $name, $email, $password, $phone, $gender;
    protected $listeners = ['edit-user' => 'loadUser'];

    protected function rules()
{
    return [
        'name' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('users', 'email')->ignore($this->user_id),
        ],
        'password' => 'nullable|min:6',
        'phone' => 'nullable|string|max:20',
        'gender' => 'nullable|in:male,female,other',
    ];
}

    public function save()
    {
        $this->validate();

        User::updateOrCreate(
            ['id' => $this->user_id],
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password ? Hash::make($this->password) : User::find($this->user_id)?->password,
                'phone' => $this->phone,
                'gender' => $this->gender,
            ]
        );

        $this->resetForm();
        $this->dispatch('user-updated');
        session()->flash('message', 'Utente salvato con successo!');
    }

    public function loadUser($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->gender = $user->gender;
    }

    public function resetForm()
    {
        $this->reset(['user_id', 'name', 'email', 'password', 'phone', 'gender']);
    }
    

    public function render()
    {
        return view('livewire.user-form');
    }
}
