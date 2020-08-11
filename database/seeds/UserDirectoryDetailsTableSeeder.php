<?php

use Illuminate\Database\Seeder;

class UserDirectoryDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        DB::table('user_directory_details')->insert([
            'user_id' => 2,
            'directory_name' => 'Milestones',
            'directory_path' => 'wp-content/theme/rezaid/milestones',
            'number_of_files' => 2,
            'directory_size' => 2,
            'parent_directory_id' => 0,
        ]);
    }
}
