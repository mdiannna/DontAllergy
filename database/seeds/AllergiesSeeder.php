<?php

use Illuminate\Database\Seeder;

class AllergiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergies = [];
        for ($i = 0; $i < 30; $i++) {
            $allergies[] = ['name' => 'Allergy' . $i, 'season_id' => rand(1,4)];
        }
        DB::table('allergies')->insert($allergies);
    }
}
