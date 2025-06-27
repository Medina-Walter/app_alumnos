<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('id_alumno'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->string('dni', 10)->unique();
            $table->date('fecha_nac');
            $table->string('email', 20);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
