<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('age');
            $table->enum('gender', ['masculino', 'femenino']);
            $table->enum('civil_status', ['soltero', 'casado', 'divorciado', 'viudo']);
            $table->enum('scholarship', ['capacitacion', 'medio-basico', 'medio-superior', 'superior', 'posgrado', 'ninguna']);
            $table->string('phone');
            $table->string('address');
            $table->string('job');
            $table->string('status')->default('Activo');
            $table->string('checkbox')->nullable();
            $table->string('religion')->nullable();
            $table->string('time')->nullable();
            $table->string('reason')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('psychologist_id');
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
        Schema::dropIfExists('patients');
    }
}
