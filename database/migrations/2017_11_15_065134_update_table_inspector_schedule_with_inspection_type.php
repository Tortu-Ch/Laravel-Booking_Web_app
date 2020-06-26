<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableInspectorScheduleWithInspectionType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
              Schema::table('inspector_schedule', function($table) {
            $table->string('inspection_type')->nullable();    
    });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspector_schedule', function($table) {
        $table->dropColumn('inspection_type');
    });
    }
}
