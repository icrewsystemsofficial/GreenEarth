<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Carbon\Carbon;

class CreateDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directories', function (Blueprint $table) {
            $table->id();
            $table->string('business_owner'); # (Rishi) Clarify w/ Leonard.
            #$table->foreign('business_owner')->references('name')->on('users'); # FK Constraint
            $table->string('business_name');
            $table->string('brand_name')->nullable();
            $table->longText('business_about')->nullable();
            $table->longText('location');
            $table->dateTime('business_founding_date')->nullable();
            $table->dateTime('carbon_neutral_since')->default(Carbon::now()); # $cast
            $table->integer('total_carbon_emission')->default(0);
            $table->integer('total_trees_in_grove')->default(0);
            $table->integer('total_carbon_offset')->default(0);
            $table->integer('employee_count')->default(0);
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('website_link')->nullable();
            $table->string('business_name_slug')->nullable();
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
        Schema::dropIfExists('directories');
    }
}
