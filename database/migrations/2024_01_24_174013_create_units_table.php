<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->string('product_maker');
            $table->string('unit_type');
            $table->string('unit_code_number');
            $table->string('unit_serial_number');
            $table->string('engine_model');
            $table->string('engine_mnemonic');
            $table->string('engine_serial_model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
