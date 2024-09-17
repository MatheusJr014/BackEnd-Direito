<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/index',[ProfessorController::class, 'index'])->name('api.index');
Route::post('/store',[ProfessorController::class, 'store'])->name('api.store');




Route::get('/viewcadastros', [AlunoController::class, 'viewcadastros'])->name('api.viewcadastros');
Route::post('/criaaluno', [AlunoController::class, 'criaaluno'])->name('api.criaaluno'); 


Route::post('login', [AuthController::class, 'login']);


