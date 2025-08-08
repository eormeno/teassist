<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->unsignedBigInteger('therapist_id')->nullable(); // columna que almacena el ID del terapeuta
            $table->foreign('therapist_id')->references('id')->on('users')->onDelete('set null'); // relación con la tabla therapists
        });
    }

    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['therapist_id']);
            $table->dropColumn('therapist_id');
        });     
    }
};
