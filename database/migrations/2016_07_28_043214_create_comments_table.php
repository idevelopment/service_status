<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('comment');
            $table->timestamps();
        });

        Schema::create('comments_incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comments_id')->unsigned()->index();
            $table->foreign('comments_id')->references('id')->on('comments')->onDelete('cascade');
            $table->integer('incidents_id')->unsigned()->index();
            $table->foreign('incidents_id')->references('id')->on('incidents')->onDelete('cascade');
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
        Schema::drop('comments');
        Schema::drop('comments_incidents');
    }
}
