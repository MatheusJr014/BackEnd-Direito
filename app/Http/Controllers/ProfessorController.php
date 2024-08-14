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

    public function validationMatricula(Request $request)
    {
        $existingMatricula = Professor::where('matricula', $request->input('matricula'))->first();
        if ($existingMatricula){
            return response()->json(['error' => 'Matricula já cadastrada'], 400); 

        } 

        $professor = new Professor(); 
        $professor->matricula = $request->input('matricula'); 
        $professor->save(); 
        return response()->json(['message' => 'Matricula cadastrada com sucesso'], 201); 
    }

    public function validationEmail(Request $request)
    {
        $existingEmail = Professor::where('email', $request->input('email'))->first(); 
        if ($existingEmail){
            return response()->json(['error'=> 'Esse email já é cadastrado'], 400); 
        }

        $professor = new Professor(); 
        $professor->email = $request->input('email'); 
        $professor->save(); 
        return response()->json(['message'=> 'Email cadastrado com sucesso'], 201); 
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function criar(Request $request)
    {
        try{
            $this->model->create($request->all());
            return response('Criado com sucesso!'); 
        } catch(\Throwable $th){
            throw $th; 
        }

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
