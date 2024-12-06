<?php
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;
 
 class AddSupervisorIdToStudentsTable extends Migration
 {
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
         Schema::table('students', function (Blueprint $table) {
             $table->unsignedBigInteger('supervisor_id')->nullable()->after('id'); // Add the foreign key column
             $table->foreign('supervisor_id')->references('id')->on('supervisors')->onDelete('set null'); // Set foreign key constraint
         });
     }
 
     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('students', function (Blueprint $table) {
             $table->dropForeign(['supervisor_id']); // Drop the foreign key constraint
             $table->dropColumn('supervisor_id'); // Drop the column
         });
     }
 }
 