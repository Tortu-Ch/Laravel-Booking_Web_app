<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HousingAuthorityLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('housingAuthority_location', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('housing_authority_id');
            $table->integer('location_id');
            $table->integer('is_permanent');
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
        Schema::dropIfExists('housingAuthority_location');
    }
}
