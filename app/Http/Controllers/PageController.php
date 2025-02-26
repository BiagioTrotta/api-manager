<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Homepage';
        $users = User::all();
        $categories = Category::all();
        $articles = Article::all();

        return view('homepage', compact('title', 'users', 'categories', 'articles'));
    }

    // Modifica un utente
    public function editUser(User $user)
    {
        return view('users.edit-user', compact('user'));
    }


    // Aggiorna un utente
    public function updateUser(Request $request, User $user)
    {
        // Validazione dei dati
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Aggiornamento dei dati
        $user->update($request->all());

        // Reindirizza alla homepage con un messaggio di successo
        return redirect()->route('homepage')->with('success', 'User updated successfully');
    }


    // Elimina un utente
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('homepage')->with('success', 'User deleted successfully');
    }

    // Modifica una categoria
    public function editCategory(Category $category)
    {
        return view('categories.edit-category', compact('category'));
    }

    // Aggiorna una categoria
    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('homepage')->with('success', 'Category updated successfully');
    }

    // Elimina una categoria
    public function destroyCategory(Category $category)
    {
        $category->delete();
        return redirect()->route('homepage')->with('success', 'Category deleted successfully');
    }

    // Modifica un articolo
    public function editArticle(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit-article', compact('article', 'categories'));
    }

    // Aggiorna un articolo
    public function updateArticle(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article->update($request->all());

        return redirect()->route('homepage')->with('success', 'Article updated successfully');
    }

    // Elimina un articolo
    public function destroyArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('homepage')->with('success', 'Article deleted successfully');
    }

    public function userIndex() {
        $title = 'Users Index';
        return view('users.index', compact('title'));
    }

    public function articleIndex() {
        $title = 'Articles Index';
        return view('articles.index', compact('title'));
    }

    public function categoryIndex() {
        $title = 'Categories Index';
        return view('categories.index', compact('title'));
    }
}
