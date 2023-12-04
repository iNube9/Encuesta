<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'descripcion' => 'Galletas',
                'precio' => 19,
                'cantidad' => 100,
                'review' => 4,
            ],
            [
                'descripcion' => 'Refresco 1L',
                'precio' => 29,
                'cantidad' => 50,
                'review' => 5,
            ],
            // Agrega más registros según tus necesidades
        ]);
    }
}
