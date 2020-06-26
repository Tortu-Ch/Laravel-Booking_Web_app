<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectorScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspector_schedule', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('inspector_id');
            $table->text('inspector_notes');
            $table->integer('tenant_id');
            $table->integer('land_lord_id');
            $table->integer('land_lords_property_id');
            $table->dateTime('inspection_date');
            $table->integer('status')->default(0);
            $table->integer('created_by')->nullable();;
            $table->integer('updated_by')->nullable();;
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
     Schema::dropIfExists('inspector_schedule');
 }
}
