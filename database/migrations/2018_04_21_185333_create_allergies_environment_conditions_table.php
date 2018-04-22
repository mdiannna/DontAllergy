<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergiesEnvironmentConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergies_env_conditions', function (Blueprint $table) {
            $table->integer('allergy_id')->unsigned();
            $table->integer('env_condition_id')->unsigned();

            // foreign keys
            $table->foreign('allergy_id')
                ->references('id')
                ->on('allergies')
                ->onDelete('cascade');

            $table->foreign('env_condition_id')
                ->references('id')
                ->on('environment_conditions')
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
        Schema::dropIfExists('allergies_environment_conditions');
    }
}
