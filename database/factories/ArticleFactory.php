<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'img' => $this->faker->imageUrl(640, 480, 'articles', true), // URL immagine casuale
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        ];
    }
}
