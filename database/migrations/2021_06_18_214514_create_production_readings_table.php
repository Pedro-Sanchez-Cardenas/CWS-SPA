<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_waters_id')->constrained('product_waters');
            $table->foreignId('trains_id')->nullable()->constrained();
            $table->double('reading');
            $table->double('production')->default('0');
            $table->string('type');
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
        Schema::dropIfExists('production_readings');
    }
}
