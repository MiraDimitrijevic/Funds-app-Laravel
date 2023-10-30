<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_funds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userID');
            $table->foreignId('fundID');
            $table->timestamps();
            $table->unique(array('userID','fundID'), 'user_fund_unique');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_funds');
    }
}
