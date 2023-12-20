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
        Schema::create('v_d_c_masters', function (Blueprint $table) {
            $table->id();
            $table->string('stock_code');
            $table->string('stock_code_pnd');
            $table->string('stock_code_pnw');
            $table->string('item_name');
            $table->string('part_number');
            $table->string('mnem_onic');
            $table->string('foto');
            $table->string('supplier');
            $table->string('price_damage_core')->nullable();
            $table->string('waktu_klaim');
            $table->enum('metode', ['warranty', 'buyback']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_d_c_masters');
    }
};
