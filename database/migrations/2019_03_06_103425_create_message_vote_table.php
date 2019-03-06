<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_vote', function (Blueprint $table) {
            $table->unsignedInteger('vote_id');
            $table->unsignedInteger('message_id');

            $table->primary(['vote_id','message_id']);

            $table->foreign('vote_id')->references('id')->on('votes')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_vote');
    }
}
