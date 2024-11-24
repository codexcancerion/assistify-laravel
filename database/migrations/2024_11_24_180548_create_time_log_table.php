<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeLogTable extends Migration
{
    public function up()
    {
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('student_id');
            $table->timestamp('check_in')->nullable();
            $table->timestamp('check_out')->nullable();
            $table->integer('total_hours_worked')->default(0);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_logs');
    }
}
