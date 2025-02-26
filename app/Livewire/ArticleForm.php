<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class ArticleForm extends Component
{
    public $article_id, $title, $content, $img, $user_id, $category_id;
    public $categories, $users;

    protected $listeners = ['edit-article' => 'loadArticle'];

    // Regole di validazione
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|url|max:2048', // validazione URL
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    // Metodo di caricamento dei dati
    public function mount()
    {
        // Recupera gli utenti e le categorie
        $this->users = User::all();
        $this->categories = Category::all();
    }

    // Metodo per salvare o aggiornare l'articolo
    public function save()
    {
        $this->validate();

        // Usa direttamente l'URL immagine, non carica un file fisico
        $imageUrl = $this->img;

        // Salva o aggiorna l'articolo
        Article::updateOrCreate(
            ['id' => $this->article_id],
            [
                'title' => $this->title,
                'content' => $this->content,
                'img' => $imageUrl, // salva l'URL
                'user_id' => $this->user_id,
                'category_id' => $this->category_id,
            ]
        );

        $this->resetForm();
        $this->dispatch('article-updated');
        session()->flash('message', 'Articolo salvato con successo!');
    }

    // Carica un articolo esistente per l'editing
    public function loadArticle($id)
    {
        $article = Article::findOrFail($id);
        $this->article_id = $article->id;
        $this->title = $article->title;
        $this->content = $article->content;
        $this->img = $article->img; // Pre-popolazione dell'URL dell'immagine
        $this->user_id = $article->user_id;
        $this->category_id = $article->category_id;
    }

    // Reset del form
    public function resetForm()
    {
        $this->reset(['article_id', 'title', 'content', 'img', 'user_id', 'category_id']);
    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
