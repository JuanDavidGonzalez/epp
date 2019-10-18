<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActivityItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for associating items  to activities (Many-to-Many)
        Schema::create('activity_item', function (Blueprint $table) {
            $table->integer('activity_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->primary(['activity_id','item_id']);

            $table->foreign('activity_id')
                ->references('id')
                ->on('activities')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_item');
    }
}
