<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Password extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passwords', function(Blueprint $table) {
            $table->id('psw_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_passwords_user_id')->references('usr_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('password');
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
        Schema::dropIfExists('passwords');
    }
}
