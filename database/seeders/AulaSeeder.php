<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aulas')->insert([
            ['data' => '2025-11-01', 'duracao_horas' => 2, 'valor_total' => 100.00, 'aluno_id' => 1, 'disciplina_id' => 1],
            ['data' => '2025-11-02', 'duracao_horas' => 1.5, 'valor_total' => 90.00, 'aluno_id' => 2, 'disciplina_id' => 2],
        ]);
        
    }
}
