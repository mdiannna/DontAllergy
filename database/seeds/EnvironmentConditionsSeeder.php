<?php

use Illuminate\Database\Seeder;

class EnvironmentConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('environment_conditions')->insert([
            ['name' => 'temperature'],
            ['name' => 'humidity'],
            ['name' => 'wind']
        ]);
    }
}
