<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergies_foods', function (Blueprint $table) {
            $table->integer('allergy_id')->unsigned();
            $table->integer('food_id')->unsigned();

            // foreign keys
            $table->foreign('allergy_id')
                ->references('id')
                ->on('allergies')
                ->onDelete('cascade');

            $table->foreign('food_id')
                ->references('id')
                ->on('foods')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergies_foods');
    }
}
