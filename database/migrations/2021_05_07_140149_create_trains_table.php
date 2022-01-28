<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();
            $table->double('capacity')->nullable();
            $table->enum('status', ['Enabled', 'Disabled'])->default('Enabled');
            $table->enum('type', ['Train', 'Irrigation', 'Municipal'])->default('Train');
            $table->foreignId('user_created_at')->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trains');
    }
}
