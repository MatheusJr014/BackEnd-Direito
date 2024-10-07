<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Professor extends Authenticatable implements JWTSubject 
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $table = 'professor';
    
    protected $fillable = [
        'nome',
        'matricula',
        'email',
        'senha'
    ];




    public function getJWTIdentifier()
    {
        return $this->getKey(); 
    }

    public function getJWTCustomClaims()
    {
        return []; 
    }

}