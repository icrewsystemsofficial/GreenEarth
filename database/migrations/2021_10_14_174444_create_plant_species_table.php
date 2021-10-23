<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_species', function (Blueprint $table) {
            $table->id();
            $table->string('common_name');
            // $table->string('scientific_name');
            $table->string('price_per_plant');
            $table->string('h2o_requirement_per_plant');
            $table->string('o2_production');
            $table->string('co2_absorption');
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
        Schema::dropIfExists('plant_species');
    }
}
