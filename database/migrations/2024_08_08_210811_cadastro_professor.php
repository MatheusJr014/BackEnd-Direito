<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CadastroProfessor', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(); 
            $table->integer('matricula')->nullable();
            $table->string('e-mail')->nullable();
            $table->string('senha')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
