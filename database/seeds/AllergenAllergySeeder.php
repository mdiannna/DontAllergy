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
            for ($j=0; $j < 3; $j++) {
                $insert[] = ['allergen_id' => rand(1, 123), 'allergy_id' => $i];
            }
        }
        DB::table('allergen_allergy')->insert($insert);
    }
}
