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
    Schema::create('time_logs', function (Blueprint $table) {
        $table->id('id');
        $table->unsignedBigInteger('student_id');
        $table->timestamp('check_in')->nullable();
        $table->timestamp('check_out')->nullable();
        $table->integer('total_hours_worked')->default(0);
        $table->timestamps();

        $table->foreign('id')->references('id')->on('students')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_logs');
    }
};
