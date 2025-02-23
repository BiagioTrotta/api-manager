<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creazione di 4 utenti
        User::factory(4)->create();

        // Creazione di 6 categorie
        Category::factory(6)->create();

        // Creazione di 10 articoli
        Article::factory(10)->create();
    }
}
