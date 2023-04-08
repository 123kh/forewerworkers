<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthertaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('othertaxs', function (Blueprint $table) {
            $table->id();
            $table->string('vacation_pay');
            $table->string('CPP_Employee_Contribution)');
            $table->string('max_value_cpp');
            $table->string('cpp_employers_contribution');
            $table->string('Max_Values_con');
            $table->string('EI_Employee_Contribution');
            $table->string('Max_Value_Ei');
            $table->string('ei_employers_contribution');
            $table->string('max_value_emprs');
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
        Schema::dropIfExists('othertaxs');
    }
}
