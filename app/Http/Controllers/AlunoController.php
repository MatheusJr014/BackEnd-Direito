<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AlunoController extends Controller
{
    protected $model; 

    public function __construct(Aluno $aluno)
    {
        $this->model = $aluno; 
    }

    public function viewcadastros()
    {
        return response($this->model->all());
    }

    public function criaaluno(Request $request)
    {
        $data = $request->validate([
            'nome' =>'required|string',
            'ra' => 'required|integer|unique:aluno,ra',
            'termo'=>'required|string',
            'sala'=>'required|string',
            'email'=>'required|string|unique:aluno,email',
            'senha'=>'required|string'
        ],[
            'ra.unique'=>'RA já cadastrado.',
            'email.unique'=>'Email já cadastrado.',
        ]);
        Aluno::create([
            'nome'=>$data['nome'],
            'ra'=>$data['ra'],
            'termo'=>$data['termo'],
            'sala'=>$data['sala'],
            'email'=>$data['email'],
            'senha'=>bcrypt($data['senha'])
        ]);
        return response()->json(['message'=>'Cadastro realizado com sucesso!'], 201); 
    }
    
}
