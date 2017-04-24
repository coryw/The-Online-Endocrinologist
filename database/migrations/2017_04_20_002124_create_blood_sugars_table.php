<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateBloodSugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugars', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('value');
			$table->dateTime('reading_time');
			$table->string('comment')->default('');
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
        Schema::dropIfExists('sugars');
    }
}
