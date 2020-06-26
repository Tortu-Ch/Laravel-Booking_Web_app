<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
     Schema::create('tenants_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenants_id');
            $table->integer('address_id');
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
           Schema::dropIfExists('tenants_addresses');
    }
}
