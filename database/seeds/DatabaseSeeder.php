<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('allergies')->truncate();
        DB::table('allergens')->truncate();
        DB::table('allergen_allergy')->truncate();
        DB::table('seasons')->truncate();
        $this->call(SeasonsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AllergensSeeder::class);
        $this->call(AllergiesSeeder::class);
        $this->call(AllergenAllergySeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(GroupsSeeder::class);
    }
}
