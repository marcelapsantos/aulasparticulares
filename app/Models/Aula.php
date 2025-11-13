<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
use App\Models\Disciplina;

class Aula extends Model
{
    // Campos que podem ser preenchidos em massa, incluindo as FKs e o valor calculado
    protected $fillable = [
        'data', 'duracao_horas', 'valor_total', 'aluno_id', 'disciplina_id'
    ];
    
    protected $casts = [
        'data' => 'date',
    ];

    // Relacionamento: Uma Aula PERTENCE A UM Aluno
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    // Relacionamento: Uma Aula PERTENCE A UMA Disciplina
    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }
}
