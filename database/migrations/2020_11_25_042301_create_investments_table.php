<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->double('Current_Money_Amount');
            $table->double('Current_Honey_Amount');
            $table->double('Amount_Taken');
            $table->double('Admin_Share_In_Percent');
            $table->double('Profit');
            $table->bigInteger('Investor_Id')->unsigned();
            $table->timestamps();
            $table->foreign('Investor_Id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investments');
    }
}
