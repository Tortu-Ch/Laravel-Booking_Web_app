<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLeasePropertiesTableWithTenantAndLandlordPermenantDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('lease_properties', function(Blueprint $table){
            $table->integer('tenant_address_id')->after('tenant_id');
            $table->integer('tenant_email_id')->after('tenant_address_id');
            $table->integer('tenant_phone_id')->after('tenant_email_id');

             $table->integer('land_lord_address_id')->after('land_lord_id');
            $table->integer('land_lord_email_id')->after('land_lord_address_id');
            $table->integer('land_lord_phone_id')->after('land_lord_email_id');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('lease_properties', function(Blueprint $table){
           $table->dropColumn('tenant_address_id');
           $table->dropColumn('tenant_email_id');
           $table->dropColumn('tenant_phone_id');
           $table->dropColumn('land_lord_address_id');
           $table->dropColumn('land_lord_email_id');
           $table->dropColumn('land_lord_phone_id');
          
        });
    }
}
