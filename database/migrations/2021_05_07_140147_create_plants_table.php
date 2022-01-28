<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('location');
            $table->foreignId('countries_id')->constrained();
            $table->foreignId('currencies_id')->constrained();
            $table->string('cover_path')->nullable();
            $table->double('installed_capacity')->nullable();
            $table->integer('cisterns_quantity')->default('0');
            $table->foreignId('plant_types_id')->constrained();
            $table->double('design_limit')->nullable();

            // Personalizacion de los formularios
            $table->enum('irrigation', ['yes', 'no'])->default('no');
            $table->enum('sdi', ['yes', 'no'])->default('no');
            $table->enum('chloride', ['yes', 'no'])->default('no');
            $table->enum('well_pump', ['yes', 'no'])->default('no');
            $table->enum('feed_pump', ['yes', 'no'])->default('no');
            $table->enum('boosterc', ['yes', 'no'])->default('no');

            $table->foreignId('attendant')->nullable()->constrained('users');
            $table->foreignId('manager')->nullable()->constrained('users');
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
        Schema::dropIfExists('plants');
    }
}
