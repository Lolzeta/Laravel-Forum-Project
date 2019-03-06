<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_vote', function (Blueprint $table) {
            $table->unsignedInteger('vote_id');
            $table->unsignedInteger('room_id');

            $table->primary(['vote_id','room_id']);

            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_vote');
    }
}
