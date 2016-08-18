<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('students', function (Blueprint $table) {

           $table->unique('_id');
           $table->string('enrollment_number');
           $table->string('name');
           $table->index('course_id');
           $table->index('serie_id');
           $table->date('birth_date');
           $table->string('gender');
           $table->string('father_name');
           $table->string('mother_name');
           $table->string('address_name');
           $table->string('address_number');
           $table->string('address_neighbor');
           $table->string('address_city');
           $table->string('address_state');
           $table->string('phone_number');
           $table->decimal('discount');

           $table->timestamps();

       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('students');
    }
}
