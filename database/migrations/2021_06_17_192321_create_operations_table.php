<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trains_id')->constrained();

            $table->double('hp');
            $table->double('hpF');

            $table->double('sdi')->nullable();
            $table->double('ph');
            $table->double('temperature');

            $table->double('feed');
            $table->double('permeated');
            $table->double('rejection');

            $table->double('feed_flow');
            $table->double('permeate_flow');

            $table->double('hp_in');
            $table->double('hp_out');
            $table->double('reject');

            $table->text('observations')->nullable();
            $table->foreignId('user_created_at')->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
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
        Schema::dropIfExists('operations');
    }
}
