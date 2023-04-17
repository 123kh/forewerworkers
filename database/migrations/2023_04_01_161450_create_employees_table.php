<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('location_id');
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('address');
            $table->string('contact_number');
            $table->string('Email');
            $table->string('ID_proof');
            $table->string('address_proof');
            $table->date('DOB');
            $table->string('sin');
            $table->string('bcdl');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('bank_details');
           
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
        Schema::dropIfExists('employees');
    }
}
