<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categorias_id' => \App\Models\Categoria::inRandomOrder()->first()->id, 
            // 'user_id' => User::factory(), 
            // creates new, non-existent user_id's 
            'titulo' => $this->faker->name, 
            'contenido'=> $this->faker->text, 
        ];
    }
}
