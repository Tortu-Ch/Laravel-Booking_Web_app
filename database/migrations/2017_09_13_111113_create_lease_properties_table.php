<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
Schema::create('lease_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->integer('land_lord_id');
            $table->integer('land_lords_property_id');
            $table->date('from_date');
            $table->date('to_date');
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
           Schema::dropIfExists('lease_properties');
    }
}
