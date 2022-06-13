<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $artricles = Article::where('published',1)->pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'stars' => $this->faker->numberBetween(1, 5),
            'body' => $this->faker->text(),
            'approved' => $this->faker->boolean(),
            'article_id' => $artricles[array_rand($artricles)],
        ];
    }
}
