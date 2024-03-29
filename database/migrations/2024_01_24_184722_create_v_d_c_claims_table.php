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
            $table->enum('handle_by', ['plant1', 'plant2'])->nullable();
            $table->string('report_no');
            $table->date('report_date');
            $table->string('wr_mr');
            $table->string('ex_po')->nullable();
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
            $table->bigInteger('user_depthead')->unsigned()->nullable();
            $table->enum('approval_depthead', ['approve', 'reject'])->nullable();
            $table->string('remarks_depthead')->nullable();
            $table->string('pdf_vdc_claim')->nullable();
            $table->string('purchase_order')->nullable();
            $table->date('date_send_to_supplier')->nullable();
            $table->date('date_received_supplier')->nullable();
            $table->string('supplier_analysis')->nullable();
            $table->enum('status_claim', ['approve', 'reject'])->nullable();
            $table->date('date_claim_status')->nullable();
            $table->integer('qty_claim_approved')->nullable();
            $table->integer('qty_claim_rejected')->nullable();
            $table->string('remarks')->nullable();
            $table->string('report_delivery')->nullable();
            $table->foreign('user_depthead')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('supplier_updated_at')->nullable();
            $table->date('depthead_updated_at')->nullable();
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
