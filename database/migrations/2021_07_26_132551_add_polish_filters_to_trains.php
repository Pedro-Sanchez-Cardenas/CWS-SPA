<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPolishFiltersToTrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->foreignId('polish_filters_types_id')->after('multimedia_filter_quantity')->nullable()->constrained('polish_filter_types');
            $table->addColumn('integer','polish_filters_quantity')->after('polish_filters_types_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('polish_filters_quantity');
            $table->dropColumn('polish_filters_types_id');
        });
    }
}
