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
        Schema::create('talleres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('descripcion', 100);
            $table->integer('cupo_maximo');
            $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talleres');
    }
};
