<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() { 
        return [ 
            'post_id' => \App\Models\Posts::inRandomOrder()->first()->id, 
            'contenido' => $this->faker->sentence,
        ]; 
    }
}
