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
        Schema::create('patient_therapist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('therapist_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('patient_id')->references('id')->on('users')->onDelete('cascade');
            $table->unique(['therapist_id', 'patient_id']); // evita duplicados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_therapist');
    }
};
