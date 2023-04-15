<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignJobModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_job_models', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('location_id');
            $table->integer('company_id');
            $table->integer('employee_id');
            $table->string('job_title');
            $table->text('job_description');
            $table->string('job_start_date');
            $table->string('job_end_date');
            $table->float('expected_hour');
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
        Schema::dropIfExists('assign_job_models');
    }
}
