<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreesUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tree_id');
            $table->foreign('tree_id')->references('id')->on('trees')->onDelete('cascade');
            $table->string('health')->default('Healthy');
            $table->text('remarks');
            $table->string('image_path');
            $table->string('updated_by');
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
        Schema::dropIfExists('trees_updates');
    }
}
