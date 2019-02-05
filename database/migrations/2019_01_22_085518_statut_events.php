<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StatutEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statutevents', function (Blueprint $table) {
            $table->integer('id_event');
            $table->foreign('id_event')->references('id')->on('events'); 
            $table->boolean('eventpast');
            $table->boolean('eventfutur');
            $table->boolean('eventproposition');
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
        //
    }
}
