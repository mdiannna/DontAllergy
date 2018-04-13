<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergenAllergyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_allergy', function (Blueprint $table) {
            $table->integer('allergy_id')->unsigned();
            $table->integer('allergen_id')->unsigned();

            // foreign keys
            $table->foreign('allergy_id')
                ->references('allergies')
                ->on('id')
                ->onDelete('cascade');

            $table->foreign('allergen_id')
                ->references('allergens')
                ->on('id')
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
        Schema::dropIfExists('allergen_allergy');
    }
}
