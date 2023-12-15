<?php

namespace Database\Factories;

use Illuminate\Support\Str; // clase propia de laravel que permite convertir cualquier texto en una url amigable
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1, // Para poder onservar la relación con la tabla POST. Creando un usuario de prueba
            'title'   => $title = $this->faker->sentence(), // título para escribir una oración falsa. Se usa este método
            'slug'  => Str::slug($title), // url amigable
            'body'  => $this->faker->text(2200) // para crear un texto grande
        ];
    }
}