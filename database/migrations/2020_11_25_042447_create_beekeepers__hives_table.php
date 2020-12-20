<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeekeepersHivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beekeepers__hives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Hive_Id')->unsigned();
            $table->bigInteger('Beekeeper_Id')->unsigned();
            $table->timestamps();
            $table->foreign('Hive_Id')->references('id')->on('hives')->onDelete('cascade');
            $table->foreign('Beekeeper_Id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beekeepers__hives');
    }
}
