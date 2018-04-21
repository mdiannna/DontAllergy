<?php

use Illuminate\Database\Seeder;

class AllergenAllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        for ($i=1; $i <= 30; $i++) { 
            $insert[] = ['allergen_id' => rand(1, 4), 'allergy_id' => $i];
        }
        DB::table('allergen_allergy')->insert($insert);
    }
}
