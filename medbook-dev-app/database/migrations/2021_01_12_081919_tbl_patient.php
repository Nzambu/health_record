<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPatient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_patient', function (Blueprint $table) {
            $table->id('ptn_id');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id','fk_tbl_patient_gender_id')->references('gnd_id')->on('tbl_gender')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id','fk_tbl_patient_service_id')->references('srv_id')->on('tbl_service')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->string('name')->unique();
            $table->date('dob');
            $table->string('comments', 255);
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
        Schema::dropIfExists('tbl_patient');
    }
}
