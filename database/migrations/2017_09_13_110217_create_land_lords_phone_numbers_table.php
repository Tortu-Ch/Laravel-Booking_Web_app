<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandLordsPhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
     Schema::create('land_lords_phone_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('land_lord_id');
            $table->integer('phone_numbers_id');
            $table->integer('is_primary');
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
           Schema::dropIfExists('land_lords_phone_numbers');
    }
}
