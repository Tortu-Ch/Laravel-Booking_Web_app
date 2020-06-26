<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function(Blueprint $table){
            $table->string('firstname')->after('id');
            $table->string('lastname')->after('firstname');
            $table->string('username')->after('lastname');
            $table->string('image')->after('password')->nullable();
            $table->string('email_token')->after('image')->nullable();
            $table->integer('active')->default(0);
            $table->dropColumn('name');        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function(Blueprint $table){
           $table->dropColumn('firstname');
           $table->dropColumn('lastname');
           $table->dropColumn('username');
           $table->dropColumn('image');
           $table->string('name')->after('id');
        });
    }
}
