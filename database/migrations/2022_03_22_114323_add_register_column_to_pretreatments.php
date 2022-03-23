<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegisterColumnToPretreatments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pretreatments', function (Blueprint $table) {
            $table->addColumn('integer', 'register')->after('trains_id');
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
            $table->removeColumn('register');
        });
    }
}
