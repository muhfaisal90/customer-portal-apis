<?php

use Illuminate\Database\Seeder;

class UserNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_notifications')->insert([
            /*'user_id' => 2,
            'user_file_detail_id' => 4,
            'user_directory_detail_id' => 6,
            'notification_type' => 'upload',
            'notification_message' => 'New file has been uploaded',*/

            'user_id' => 2,
            'user_file_detail_id' => 5,
            'user_directory_detail_id' => 9,
            'notification_type' => 'update',
            'notification_message' => 'File has been updated',

            /*'notification_type' => 'general',
            'notification_message' => 'There will be a maintenance happening on following date from 2:00 to 3:00',*/
        ]);
    }
}
