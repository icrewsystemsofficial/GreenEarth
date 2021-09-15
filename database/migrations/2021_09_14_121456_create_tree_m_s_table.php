<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreeMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tree_m_s', function (Blueprint $table) {
            $table->id();
            $table->text('FKkk')->nullable();
            //later add FK for treeID
            $table->text('title');
            $table->text('description');
            $table->string('health');
            $table->text('suggestions')->nullable();
            $table->timestamps();
        });
    }

            
  //          $table->string('role')->default('Role');;
//            $table->timestamps();
        

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tree_m_s');
    }
}
