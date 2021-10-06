<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdditionalFieldToDirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directories', function (Blueprint $table) {
            $table->string('business_id')->after('business_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directories', function (Blueprint $table) {
            $table->dropColumn('business_id', 'other', 'columns');
        });
    }
}
