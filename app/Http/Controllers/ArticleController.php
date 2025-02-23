<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Article::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'img' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article = Article::create($validatedData);

        return response()->json($article, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json($article, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'img' => 'nullable|string',
            'user_id' => 'sometimes|required|exists:users,id',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $article->update($validatedData);

        return response()->json($article, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(['message' => 'Articolo eliminato con successo'], 200);
    }
}
