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
            $table->string('stock_code_vdc');
            $table->string('stock_code_vdc_claim');
            $table->string('picture');
            $table->string('item_desc');
            $table->string('mnem_onic');
            $table->string('part_number');
            $table->string('type_of_item');
            $table->string('supplier');
            $table->string('uoi');
            $table->integer('price_damage_core');
            $table->integer('price_product_genuine');
            $table->integer('price_total');
            $table->string('warranty_time_guarantee');
            $table->enum('claim_method', ['warranty', 'buyback']);
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
