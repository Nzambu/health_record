<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            // $table->string('email')->index();
            $table->id('psr_id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id', 'fk_password_resets_user_id')->references('usr_id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
