<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatesTablesV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('processes', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('risks', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('description');
            //$table->integer('activity_id')->unsigned();
            //
            //$table->foreign('activity_id')
            //    ->references('id')
            //    ->on('activities')
            //    ->onUpdate('restrict')
            //    ->onDelete('restrict');
        });

        Schema::table('users', function (Blueprint $table){
            //$table->dropColumn('position');
            $table->bigInteger('position_id')->unsigned()->nullable();

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });

        Schema::table('activities', function (Blueprint $table){
            $table->bigInteger('process_id')->unsigned()->nullable();

            $table->foreign('process_id')
                ->references('id')
                ->on('processes')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });

        Schema::table('items', function (Blueprint $table){
            $table->string('rule')->nullable();
            $table->text('specification')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
        Schema::dropIfExists('processes');
        Schema::dropIfExists('risks');
    }
}
