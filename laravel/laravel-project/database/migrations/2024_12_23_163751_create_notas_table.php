<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('notas', function (Blueprint $table) {

        $table->unsignedBigInteger('alumno_id');
        $table->unsignedBigInteger('asignatura_id');
        $table->decimal('nota', 5, 2);

        $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');

        $table->primary(['alumno_id', 'asignatura_id']);
        
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
