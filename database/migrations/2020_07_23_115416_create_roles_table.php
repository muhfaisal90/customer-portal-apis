<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name',100);
            $table->enum('file_creation_allowed', ['0', '1'])->default('0');
            $table->enum('file_deletion_allowed', ['0', '1'])->default('0');
            $table->enum('file_view_allowed', ['0', '1'])->default('0');
            $table->enum('file_download_allowed', ['0', '1'])->default('0');
            $table->enum('folder_creation_allowed', ['0', '1'])->default('0');
            $table->enum('folder_deletion_allowed', ['0', '1'])->default('0');
            $table->enum('folder_view_allowed', ['0', '1'])->default('0');
            $table->enum('folder_download_allowed', ['0', '1'])->default('0');
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
        Schema::dropIfExists('roles');
    }
}
