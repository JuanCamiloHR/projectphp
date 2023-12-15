<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create(); // crear un usuario
        \App\Models\Post::factory(80)->create(); // crear 80 registros. Trabaja de la mano con el postfactoryphp
    }
}