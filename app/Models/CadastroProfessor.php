<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CadastroProfessor extends Model
{
    use HasFactory;
    protected $table = 'professor';
    
    protected $fillable = [
        'nome',
        'matricula',
        'e-mail',
        'senha'
    ];
}
