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
        // Genera un ID casuale per Picsum
        $randomId = $this->faker->numberBetween(1, 500);

        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'img' => "https://picsum.photos/id/{$randomId}/300/150",
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
        ];
    }
}
