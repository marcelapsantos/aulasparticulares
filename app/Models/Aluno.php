<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aula; // Importa o Model Aula

class Aluno extends Model
{
    // Campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'telefone', 'email'];

    // Relacionamento: Um Aluno TEM MUITAS Aulas
    public function aulas()
    {
        return $this->hasMany(Aula::class);
    }
}
