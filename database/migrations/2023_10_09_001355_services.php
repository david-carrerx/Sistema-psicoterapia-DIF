<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Services extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table)
        {
            $table->id();
            $table->string('name');  
            $table->string('price');
            $table->timestamps();
        });

        //Inserción de los datos
        DB::table('services')->insert([
            ['name' => 'Entrevistas', 'price' => '20'],
            ['name' => 'Terapia niñ@s', 'price' => '30'],
            ['name' => 'Terapia adolescentes', 'price' => '50'],
            ['name' => 'Terapia individual (adulto)', 'price' => '50'],
            ['name' => 'Terapia de pareja', 'price' => '100'],
            ['name' => 'Terapia familiar', 'price' => '100'],
            ['name' => 'Valoraciones', 'price' => '200'],
            ['name' => 'Valoración adopciones', 'price' => '800'],
            ['name' => 'Valoración adopciones consentidas', 'price' => '400'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
