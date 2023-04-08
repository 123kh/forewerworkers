<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companysregs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('transit_number');
            $table->string('institution_number');
            $table->string('account_number');
            $table->string('address');
            $table->string('zip');
            $table->string('contact_person');
            $table->string('email');
            $table->string('contact_number');
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
        Schema::dropIfExists('companysregs');
    }
}
