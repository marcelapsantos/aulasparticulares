<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula; 
use App\Models\Disciplina;

class Disciplina extends Model
{
    protected $table = 'nome_real_da_tabela';
    protected $fillable = ['nome', 'carga_horaria', 'valor_hora'];

    // Relacionamento: Uma Disciplina É MINISTRADA em MUITAS Aulas
    public function aulas()
    {
        return $this->hasMany(Aula::class);
    }
}