<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('name');
            $table->string('address_name');
            $table->string('address_number');
            $table->string('address_neighbor');
            $table->string('address_postalcode');
            $table->string('address_city');
            $table->string('address_state');
            $table->string('address_complement');
            $table->string('phone_areacode');
            $table->string('phone_number');
            $table->string('email');
            $table->string('logo');
            $table->string('slogan');
            $table->string('operation_act_number');
            $table->date('ploy_date');
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
       Schema::drop('companies');
    }
}
