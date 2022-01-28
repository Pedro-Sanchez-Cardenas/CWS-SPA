<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_invoice', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();
            $table->foreignId('trains_id')->constrained();
            $table->string('period');
            $table->double('current_reading');
            $table->double('previous_reading');
            $table->string('discounts')->default('0');
            $table->enum('discount_type', ['percent','cash'])->default('cash');
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
        Schema::dropIfExists('production_invoice');
    }
}
