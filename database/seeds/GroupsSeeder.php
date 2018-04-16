<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => 'Group 1', 'description' => 'Description 1'],
            ['name' => 'Group 2', 'description' => 'Description 2'],
            ['name' => 'Group 3', 'description' => 'Description 3'],
            ['name' => 'Group 4', 'description' => 'Description 4']
        ]);
    }
}
