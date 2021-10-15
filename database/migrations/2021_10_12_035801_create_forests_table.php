<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('country');
            $table->string('lat');
            $table->string('long');
            $table->longText('geojson_path')->nullable();
            $table->string('area')->default('0');
            $table->longText('description');
            $table->string('irrigation_type')->nullable();
            $table->string('soil_type')->nullable();
            $table->string('user_incharge')->references('id')->on('users')->nullable();
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('forests');
    }
}
