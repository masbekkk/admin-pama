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
            $table->string('stock_code_vdc')->nullable();
            $table->string('stock_code_vdc_claim')->nullable();
            $table->string('picture')->nullable();
            $table->string('item_name')->nullable();
            $table->string('mnemonic')->nullable();
            $table->string('part_number')->nullable();
            $table->string('type_of_item')->nullable();
            $table->string('supplier')->nullable();
            $table->string('supplier_address')->nullable();
            $table->string('uoi')->nullable();
            $table->double('price_damage_core')->nullable();
            $table->double('price_product_genuine')->nullable();
            $table->double('price_total')->nullable();
            $table->string('warranty_time_guarantee')->nullable();
            $table->enum('claim_method', ['CWP', 'BUY BACK'])->nullable();
            $table->string('claim_document')->nullable();
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
