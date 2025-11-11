<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('disciplinas')->insert([
            ['nome' => 'Matemática', 'carga_horaria' => 40, 'valor_hora' => 50.00],
            ['nome' => 'Inglês', 'carga_horaria' => 30, 'valor_hora' => 60.00],
        ]);
        
    }
}
