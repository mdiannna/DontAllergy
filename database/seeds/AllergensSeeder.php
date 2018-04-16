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
        $allergens = [];
        for ($i=0; $i < 123; $i++) { 
            $allergens[] = ['name' => 'Allergen' . $i];
        }
        DB::table('allergens')->insert($allergens);
    }
}
