<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->unique();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        //Schema::create('role_user', function (Blueprint $table) {
        //    $table->bigInteger('user_id')->unsigned();
        //    $table->integer('role_id')->unsigned();
        //    $table->primary(['user_id', 'role_id']);
        //
        //    $table->foreign('user_id')
        //        ->references('id')
        //        ->on('users')
        //        ->onUpdate('restrict')
        //        ->onDelete('restrict');
        //
        //    $table->foreign('role_id')
        //        ->references('id')
        //        ->on('roles')
        //        ->onUpdate('restrict')
        //        ->onDelete('restrict');
        //
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        //Schema::dropIfExists('role_user');

    }
}
