<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    protected $listeners = ['user-updated' => 'render'];

    public function edit($id)
    {
        $this->dispatch('edit-user', id: $id);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Utente eliminato con successo!');
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::all()
        ]);
    }
}
