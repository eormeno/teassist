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
        Schema::table('patient_activities', function (Blueprint $table) {
            $table->date('completed_at')->nullable();
        });
}



    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('patient_activities', function (Blueprint $table) {
            $table->dropColumn('completed_at');
        });
}
};
