<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->change();
            $table->foreignId('user_file_detail_id')->nullable()->change();
            $table->foreignId('user_directory_detail_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_notifications', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('user_file_detail_id');
            $table->foreignId('user_directory_detail_id');
        });
    }
}
