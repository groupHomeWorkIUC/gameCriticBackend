<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewReaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_reaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_id');
            $table->integer('sad');
            $table->integer('hot');
            $table->integer('happy');
            $table->integer('calm');
            $table->integer('funny');
            $table->foreign('new_id')->references('id')->on('news');
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
