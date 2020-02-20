<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');

            $table->unsignedBigInteger('post');
            $table->foreign('post')->references('id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_likes');
    }
}
