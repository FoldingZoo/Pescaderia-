<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::insert([
            ['nombre' => 'Pescados'],
            ['nombre' => 'Mariscos'],
            ['nombre' => 'Camarones'],
            ['nombre' => 'Otros'],
        ]);
    }
}
