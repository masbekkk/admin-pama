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
        Schema::create('v_d_c_claims', function (Blueprint $table) {
            $table->id();
            $table->string('report_no');
            $table->date('report_date');
            $table->string('wr_mr');
            $table->foreignId('v_d_c_master_id')->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->integer('qty_vdc_claim');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('picture');
            $table->date('installation_date');
            $table->date('failure_date');
            $table->string('hm_install');
            $table->string('hm_failure');
            $table->string('failure_info');
            $table->string('pdf_vdc_claim');
            $table->string('purchase_order');
            $table->date('date_send_to_supplier');
            $table->date('date_received_supplier');
            $table->string('supplier_analysis');
            $table->enum('status_claim', ['approve', 'reject']);
            $table->date('date_claim_status');
            $table->integer('qty_claim_approved');
            $table->integer('qty_claim_rejected');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_d_c_claims');
    }
};
