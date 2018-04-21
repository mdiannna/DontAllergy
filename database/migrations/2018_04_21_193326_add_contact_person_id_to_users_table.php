<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactPersonIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('contact_person_id')->unsigned()->after('role_id')->nullable();
            
            $table->foreign('contact_person_id')
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
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'contact_person_id')) {
                $table->dropForeign('contact_person_id');
                $table->dropColumn('contact_person_id');
            }
        });
    }
}
