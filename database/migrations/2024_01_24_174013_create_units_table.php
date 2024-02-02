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
            $table->string('unit_name')->nullable();
            $table->string('product_maker')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('unit_code_number')->nullable();
            $table->string('unit_serial_number')->nullable();
            $table->string('engine_model')->nullable();
            $table->string('engine_mnemonic')->nullable();
            $table->string('engine_serial_model')->nullable();
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
