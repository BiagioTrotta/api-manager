<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryTable extends Component
{
    protected $listeners = ['category-updated' => 'render'];

    public function edit($id)
    {
        $this->dispatch('edit-category', id: $id);
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('message', 'Categoria eliminata con successo!');
    }

    public function render()
    {
        return view('livewire.category-table', [
            'categories' => Category::all()
        ]);
    }
}
