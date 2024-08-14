<?php

use App\Http\Controllers\ProfessorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/index',[ProfessorController::class, 'index'])->name('api.indexteste');
Route::post('/criar',[ProfessorController::class, 'criar'])->name('api.criar');
Route::post('/validationMatricula', [ProfessorController::class, 'validationMatricula'])->name('api.validationMatricula'); 
Route::post('/validationEmail', [ProfessorController::class, 'validationEmail'])->name('api.validationEmail'); 