<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('activity_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('activity_id')
                ->references('id')
                ->on('activities')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });

        Schema::create('item_request', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('request_id')->unsigned();
            $table->primary(['item_id', 'request_id']);

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('request_id')
                ->references('id')
                ->on('requests')
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
        Schema::dropIfExists('requests');
        Schema::dropIfExists('item_request');
    }
}
