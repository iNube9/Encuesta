<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::unprepared(file_get_contents(base_path().'/database/sql/clasificaciones.sql'));

        DB::unprepared(file_get_contents(base_path().'/database/sql/encuestas.sql'));
        DB::unprepared(file_get_contents(base_path().'/database/sql/opciones.sql'));
        DB::unprepared(file_get_contents(base_path().'/database/sql/preguntas.sql'));
        DB::unprepared(file_get_contents(base_path().'/database/sql/respuestas.sql'));
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
