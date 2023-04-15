<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysregsappendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companysregsappend', function (Blueprint $table) {
            $table->id();
            $table->integer('select_categories');
            $table->string('straight_pay_hours');
            $table->string('overtime_hours1');
            $table->string('overtime_hours2');
            $table->string('night_hours_pay');
            $table->string('company_id');

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
        Schema::dropIfExists('companysregsappend');
    }
}
