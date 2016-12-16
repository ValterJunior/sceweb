<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->index('company_id');
            $table->string('manager_cpf');
            $table->string('manager_name');
            $table->string('manager_occupation');
            $table->string('manager_email');
            $table->string('secretary_name');
            $table->decimal('bankslip_value',15,2);
            $table->decimal('bankslip_fine',15,2);
            $table->decimal('bankslip_interest',15,2);
            $table->string('bankslip_paymentplace');
            $table->string('bankslip_observations');
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
        Schema::drop('settings');
    }
}
