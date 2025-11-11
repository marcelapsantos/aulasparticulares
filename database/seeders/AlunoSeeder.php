<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alunos')->insert([
            ['nome' => 'João Silva', 'telefone' => '99999-1111', 'email' => 'joao@email.com'],
            ['nome' => 'Maria Souza', 'telefone' => '98888-2222', 'email' => 'maria@email.com'],
        ]);
    }
}
