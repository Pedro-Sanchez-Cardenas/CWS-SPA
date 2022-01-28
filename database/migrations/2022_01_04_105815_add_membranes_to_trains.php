<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMembranesToTrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->addColumn('integer', 'membrane_active_area')->after('booster_quantity')->nullable();
            $table->addColumn('integer', 'membrane_elements')->after('membrane_active_area')->nullable();
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
            $table->dropColumn('membrane_active_area');
            $table->dropColumn('membrane_elements');
        });
    }
}
