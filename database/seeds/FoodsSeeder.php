<?php

use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            ['name' => 'oranges'],
            ['name' => 'glucose'],
            ['name' => 'gluten'],
            ['name' => 'apples'],
            ['name' => 'olive oil'],
            ['name' => 'milk']
        ]);
    }
}
