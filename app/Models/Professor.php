<?php



//IGNORAR ESTÁ ERRADO ISSO AQUI ABAIXO
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professor';
    
    protected $fillable = [
        'nome',
        'matricula',
        'email',
        'senha'
    ];
}