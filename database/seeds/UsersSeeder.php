<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role_id' => 1,
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('fiicode123')
            ],
            [
                'role_id' => 2,
                'first_name' => 'Andrei',
                'last_name' => 'Popa',
                'email' => 'gabi1@demo.com',
                'password' => Hash::make('fiicode123')
            ],
            [
                'role_id' => 2,
                'first_name' => 'Gabi',
                'last_name' => 'Ghinea',
                'email' => 'gabi2@demo.com',
                'password' => Hash::make('fiicode123')
            ],
            [
                'role_id' => 2,
                'first_name' => 'Miha',
                'last_name' => 'Elena',
                'email' => 'gabi3@demo.com',
                'password' => Hash::make('fiicode123')
            ],
            [
                'role_id' => 2,
                'first_name' => 'Paul',
                'last_name' => 'Duca',
                'email' => 'gabi4@demo.com',
                'password' => Hash::make('fiicode123')
            ],

        ]);
    }
}
