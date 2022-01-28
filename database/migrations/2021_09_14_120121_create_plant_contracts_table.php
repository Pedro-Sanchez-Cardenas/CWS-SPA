<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();
            $table->double('botM3')->nullable();
            $table->double('botFixed')->nullable();
            $table->double('omM3')->nullable();
            $table->double('omFixed')->nullable();
            $table->double('remineralitation')->nullable();
            $table->double('totalM3')->nullable();
            $table->double('totalMonth')->nullable();
            $table->integer('years')->nullable();
            $table->date('from')->nullable();
            $table->date('till')->nullable();
            $table->double('minimunConsumption')->nullable();
            $table->integer('billingDay')->nullable();
            $table->integer('billingPeriod')->nullable();
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
        Schema::dropIfExists('plant_contracts');
    }
}
