<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileImageToPsychologists extends Migration
{
    public function up()
    {
        Schema::table('psychologists', function (Blueprint $table) {
            $table->string('profile_image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('psychologists', function (Blueprint $table) {
            $table->dropColumn('profile_image');
        });
    }
}
