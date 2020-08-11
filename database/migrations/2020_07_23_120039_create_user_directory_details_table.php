<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDirectoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_directory_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('directory_name',200);
            $table->string('directory_path',1000);
            $table->integer('number_of_files');
            $table->integer('directory_size');
            $table->integer('parent_directory_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_directory_details');
    }
}
