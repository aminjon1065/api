<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(15),
            'body' => $this->faker->paragraph,
            'img' => $this->faker->imageUrl,
            'categoryId' => Category::all()->random()->id,
            'userId' => User::all()->random()->id
        ];
    }
}
