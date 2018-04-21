<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allergies', function (Blueprint $table) {
            // prevention (preintampinare)
            $table->text('prevention')->nullable()->after('symptoms');
            // treatment (tratament)
            $table->text('treatment')->nullable()->after('prevention');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allergies', function (Blueprint $table) {
            $table->dropColumn('prevention');
            $table->dropColumn('treatment');
        });
    }
}
