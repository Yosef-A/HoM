<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestersHivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investors__hives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Hive_Id')->unsigned();
            $table->bigInteger('Investor_Id')->unsigned();
            $table->timestamps();
            $table->foreign('Hive_id')->references('id')->on('hives')->onDelete('cascade');
            $table->foreign('Investor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investers__hives');
    }
}
