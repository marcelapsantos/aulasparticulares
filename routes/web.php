<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AlunoController;

Route::resource('alunos', AlunoController::class);
Route::resource('disciplinas', DisciplinaController::class);
Route::resource('aulas', AulaController::class);

