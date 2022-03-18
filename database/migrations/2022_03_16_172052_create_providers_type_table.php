<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_type', function (Blueprint $table) {
            $table->id();
            $string->string('type');
            $table->string('names');
            $table->string('phones')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->foreignId('user_created_at')->constrained("users");
            $table->foreignId('user_updated_at')->constrained("users");
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
        Schema::dropIfExists('providers_type');
    }
}
