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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('posts')->truncate();
        DB::table('users')->truncate();
        DB::table('allergies')->truncate();
        DB::table('allergens')->truncate();
        DB::table('allergen_allergy')->truncate();
        DB::table('seasons')->truncate();
        DB::table('roles')->truncate();
        DB::table('groups')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->call(RolesSeeder::class);
        $this->call(SeasonsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AllergensSeeder::class);
        $this->call(AllergiesSeeder::class);
        $this->call(AllergenAllergySeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(PostsSeeder::class);
    }
}
