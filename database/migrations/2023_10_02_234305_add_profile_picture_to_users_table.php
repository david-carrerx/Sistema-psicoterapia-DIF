<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePictureToUsersTable extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('profile_picture')->nullable(); // Puedes cambiar el tipo de columna según tus necesidades
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('profile_picture');
    });
}
}
