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
        Schema::create('interaccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perro_interesado_id');
            $table->unsignedBigInteger('perro_candidato_id');
            $table->string('preferencia');
            $table->string('identificador')->unique();
            $table->timestamp('fecha_creacion')->default(now());
            $table->timestamps();

            $table->foreign('perro_interesado_id')->references('id')->on('perros')->onDelete('cascade');
            $table->foreign('perro_candidato_id')->references('id')->on('perros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interaccions');
    }
};
