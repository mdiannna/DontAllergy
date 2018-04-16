<?php

use Illuminate\Database\Seeder;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            ['name' => 'Spring'],
            ['name' => 'Summer'],
            ['name' => 'Fall'],
            ['name' => 'Winter']
        ]);
    }
}
