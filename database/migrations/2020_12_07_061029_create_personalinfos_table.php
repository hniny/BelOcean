<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalinfos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->date('date_birth');
            $table->string('place_birth');
            $table->string('religion');
            $table->string('marital_status');
            $table->string('height');
            $table->string('weight');
            $table->string('education');
            $table->string('mark');
            $table->string('father_name');
            $table->string('mother_name');
            $table->integer('shoe_size');
            $table->string('overall_size');
            $table->string('next_kin');
            $table->string('relation');
            $table->text('address');
            $table->string('phone_no');
            $table->string('email')->unique();
            $table->string('person_img');
            $table->string('readiness');
            $table->date('applied_date');
            $table->unsignedBigInteger('applied_cat_id');
            $table->foreign('applied_cat_id')->references('id')->on('applied_categories');
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
        Schema::dropIfExists('personalinfos');
    }
}
