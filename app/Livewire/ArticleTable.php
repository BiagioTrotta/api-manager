<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleTable extends Component
{
    protected $listeners = ['article-updated' => 'render'];

    // Metodo per avviare l'editing dell'articolo
    public function edit($id)
    {
        $this->dispatch('edit-article', id: $id);
    }

    // Metodo per eliminare un articolo
    public function delete($id)
    {
        Article::findOrFail($id)->delete();
        session()->flash('message', 'Articolo eliminato con successo!');
    }

    public function render()
    {
        return view('livewire.article-table', [
            'articles' => Article::all()
        ]);
    }
}
