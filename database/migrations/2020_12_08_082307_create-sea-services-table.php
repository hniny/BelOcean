<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeaServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sea-services', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_vessel');
            $table->unsignedBigInteger('vessel_id');
            $table->foreign('vessel_id')->references('id')->on('vessels');
            $table->unsignedBigInteger('personalinfo_id');
            $table->foreign('personalinfo_id')->references('id')->on('personalinfos');
            $table->string('rank');
            $table->integer('grt');
            $table->string('bph');
            $table->string('main_engine');
            $table->date('sign_on_date');
            $table->date('sign_off_date');
            $table->string('service_onboard');
            $table->string('ship_owner');
            $table->softDeletes();
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
        Schema::dropIfExists('sea-services');
    }
}
