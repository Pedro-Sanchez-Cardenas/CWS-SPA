<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFrecuenciesToPretreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pretreatments', function (Blueprint $table) {
            $table->addColumn('double', 'frecuencies_well_pump')->after('feed_pump')->nullable();
            $table->addColumn('double', 'frecuencies_feed_pump')->after('frecuencies_well_pump')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pretreatments', function (Blueprint $table) {
            $table->dropColumn('frecuencies_well_pump');
            $table->dropColumn('frecuencies_feed_pump');
        });
    }
}
