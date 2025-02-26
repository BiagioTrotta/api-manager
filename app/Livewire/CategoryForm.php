<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryForm extends Component
{
    public $category_id, $name, $description;
    protected $listeners = ['edit-category' => 'loadCategory'];

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name,' . $this->category_id,
            'description' => 'nullable|string|max:500',
        ];
    }

    public function save()
    {
        $this->validate();

        Category::updateOrCreate(
            ['id' => $this->category_id],
            [
                'name' => $this->name,
                'description' => $this->description,
            ]
        );

        $this->resetForm();
        $this->dispatch('category-updated');
        session()->flash('message', 'Categoria salvata con successo!');
    }

    public function loadCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function resetForm()
    {
        $this->reset(['category_id', 'name', 'description']);
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
