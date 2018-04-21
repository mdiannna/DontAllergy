<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryIdColumnToStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->integer('country_id')->unsigned()->after('allergy_id')->nullable();
            
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statistics', function (Blueprint $table) {
            if (Schema::hasColumn('statistics', 'country_id')) {
                $table->dropForeign('country_id');
                $table->dropColumn('country_id');
            }
        });
    }
}
