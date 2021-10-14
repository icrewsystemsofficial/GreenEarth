<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->integer('forest_id');
            $table->integer('species_id');
            $table->integer('mission_id')->nullable();
            $table->integer('cluster_id')->nullable();
            $table->integer('planted_by');
            $table->string('health')->default('Healthy');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('location')->default('India');
            $table->timestamp('last_maintained')->nullable();
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
        Schema::dropIfExists('trees');
    }
}
