<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('allergies', 'season_id')) { 
            Schema::table('allergies', function (Blueprint $table) {
                $table->integer('season_id')->unsigned();
                $table->foreign('season_id')
                    ->references('id')
                    ->on('seasons')
                    ->onDelete('cascade');
            });
        }
    }   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('allergies', 'season_id')) { 
            Schema::table('allergies', function (Blueprint $table) {
                // $table->dropForeign('season_id');
                $table->dropForeign(['season_id']);
                $table->dropColumn('season_id');
            });
        }
    }
}
