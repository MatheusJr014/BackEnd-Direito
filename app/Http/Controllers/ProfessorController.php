<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginProfessor;
use App\Models\Professor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class ProfessorController extends Controller 
{
    protected $model; 

    public function __construct(Professor $professor)
    {
        $this->model = $professor; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response($this->model->all()); 
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in store.
     */
    public function store(Request $request)
    {
            $data = $request->validate([
                'nome'=> 'required|string',
                'matricula'=> 'required|integer|unique:professor,matricula', 
                'email'=> 'required|string|unique:professor,email', 
                'senha'=> 'required|string'
            ], [
                'matricula.unique' => 'Matricula já cadastrada.',
                'email.unique' => 'Email já cadastrado.',
            ]);     
        
            Professor::create([
                'nome' => $data ['nome'],
                'matricula' => $data['matricula'],
                'email' => $data['email'],
                'senha' => bcrypt($data['senha']) // Exemplo para hash da senha
            ]);

        return response()->json(['message'=> 'Cadastro realizado com sucesso!'], 201); 
    }

   public function login_professor(LoginProfessor $request){
        $input = $request->validated();
        $credentials = [
            'matricula' => $input['matricula'], 
            'password' => $input['senha'],
        ];
        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error'=>'Unauthorized'],401); 
        }
        return response()->json([
            'acess_token'=>$token,
            'token_type'=>'bearer', 

        ]);
   }

}
