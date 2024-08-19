<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
