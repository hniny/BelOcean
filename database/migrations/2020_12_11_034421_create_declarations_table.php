<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declarations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('backgroundinfo_id');
            $table->foreign('backgroundinfo_id')->references('id')->on('backgroundinfos');
            $table->unsignedBigInteger('personalinfo_id');
            $table->foreign('personalinfo_id')->references('id')->on('personalinfos');
            $table->integer('status');
            $table->text('description');
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
        Schema::dropIfExists('declarations');
    }
}
