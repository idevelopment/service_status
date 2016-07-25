<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('incident_status_incidents', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('incidents_id')->unsigned()->index();
            $table->foreign('incidents_id')->references('id')->on('incidents')->onDelete('cascade');

            $table->integer('incident_status_id')->unsigned()->index();
            $table->foreign('incident_status_id')->references('id')->on('incident_statuses')->onDelete('cascade');

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
        Schema::drop('incident_statuses');
        Schema::drop('incident_status_incidents');
    }
}
