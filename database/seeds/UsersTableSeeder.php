<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'user_first_name' => 'Muhammad',
            'user_last_name' => 'Faisal',
            'user_company' => 'Rezaid',
            'user_email' => 'muhfaisal88@hotmail.com',
            'user_website' => 'rezaid.co.uk',
            'username' => 'muhfaisal',
            'is_active' => "1",
            'password' => Hash::make('password')
        ]);
    }
}
