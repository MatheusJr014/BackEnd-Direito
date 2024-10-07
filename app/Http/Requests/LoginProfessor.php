<?php 


namespace App\Http\Requests; 

use illuminate\Foundation\Http\FormRequest;
use Whoops\Exception\Formatter;

class LoginProfessor extends FormRequest{
    public function authorize():bool{
        return true; 
    }


    public function rules(): array{
        return [
            'matricula' => 'matricula|required', 
            'senha' => 'string|required',
        ];
    }
}