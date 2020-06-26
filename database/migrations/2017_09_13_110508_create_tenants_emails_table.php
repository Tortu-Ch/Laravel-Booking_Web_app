<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
  Schema::create('tenants_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id');
            $table->integer('email_id');
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
           Schema::dropIfExists('tenants_emails');
    }
}
