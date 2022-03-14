<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Categoria;
use App\models\Comentarios;
use App\models\Posts;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Categoria::factory(2)->create();
        Posts::factory(10)->create();
        Comentarios::factory(20)->create();
    }
}
