<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Client',
            'file_creation_allowed'     => '0',
            'file_deletion_allowed'     => '1',
            'file_view_allowed'         => '0',
            'file_download_allowed'     => '1',
            'folder_creation_allowed'   => '0',
            'folder_deletion_allowed'   => '1',
            'folder_view_allowed'       => '0',
            'folder_download_allowed'   => '1',
        ]);
    }
}
