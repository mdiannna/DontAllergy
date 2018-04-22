<?php

use Illuminate\Database\Seeder;

class AllergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('allergens')->insert([
            ['name' => 'pollen'],
            ['name' => 'sun'],
            ['name' => 'dust'],
            ['name' => 'bugs']
        ]);
    }
}
