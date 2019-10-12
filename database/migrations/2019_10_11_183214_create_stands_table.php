<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('length');
            $table->integer('width');
            $table->integer('heigth');
            $table->timestamps();

            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')
            ->references('id')
            ->on('providers')
            ->onDelete('cascade');

            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
            ->references('id')
            ->on('events')
            ->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stands');
    }
}
