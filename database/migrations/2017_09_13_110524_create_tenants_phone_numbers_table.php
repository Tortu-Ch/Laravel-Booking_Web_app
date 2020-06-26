<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsPhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
   Schema::create('tenants_phone_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
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
           Schema::dropIfExists('tenants_phone_numbers');
    }
}
