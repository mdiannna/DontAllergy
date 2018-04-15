<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('value')->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('allergy_id')->unsigned()->nullable();

            $table->foreign('type_id')
                ->references('id')
                ->on('statistics_types');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('allergy_id')
                ->references('id')
                ->on('allergies');

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
        Schema::dropIfExists('statistics');
    }
}
