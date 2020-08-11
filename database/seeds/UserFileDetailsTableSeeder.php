<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserFileDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_file_details')->insert([
            'user_id' => 2,
            'user_directory_detail_id' => 4,
            'file_name' => 'contentlist.text',
            'file_path' => 'wp-content/theme/rezaid/contentlist.text',
            'file_type' => '.text',
            'file_size' => 1,
            'is_active' => "1",
            'file_last_open' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
