<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VDCClaim extends Model
{
    use HasFactory;
    // protected $table = 'v_d_c_claims';

    protected $fillable = [
        'handle_by',
        'report_no',
        'report_date',
        'wr_mr',
        'ex_po',
        'v_d_c_master_id',
        'qty_vdc_claim',
        'user_id',
        'unit_id',
        'picture',
        'installation_date',
        'failure_date',
        'hm_install',
        'hm_failure',
        'failure_info',
        'user_depthead',
        'approval_depthead',
        'remarks_depthead',
        'pdf_vdc_claim',
        'purchase_order',
        'date_send_to_supplier',
        'date_received_supplier',
        'supplier_analysis',
        'status_claim',
        'date_claim_status',
        'qty_claim_approved',
        'qty_claim_rejected',
        'remarks',
        'report_delivery',
    ];

    protected $rules = [
        // 'handle_by' => 'nullable|string|in:plant1,plant2',
        'report_no' => 'required|string|max:255',
        'report_date' => 'required|date',
        'wr_mr' => 'required|string|max:255',
        'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
        'qty_vdc_claim' => 'required|integer',
        // 'user_id' => 'required|exists:users,id',
        'unit_id' => 'required|exists:units,id',
        'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'installation_date' => 'required|date',
        'failure_date' => 'required|date',
        'hm_install' => 'required|string|max:255',
        'hm_failure' => 'required|string|max:255',
        'failure_info' => 'required|string|max:255',
        'pdf_vdc_claim' => 'nullable|file',
        'purchase_order' => 'nullable|string|max:255',
        'date_send_to_supplier' => 'nullable|date',
        'date_received_supplier' => 'nullable|date',
        'supplier_analysis' => 'nullable|string|max:255',
        'status_claim' => 'nullable|string|in:approve,reject',
        'date_claim_status' => 'nullable|date',
        'qty_claim_approved' => 'nullable|integer',
        'qty_claim_rejected' => 'nullable|integer',
        'remarks' => 'nullable|string|max:255',
    ];

    public function getRules()
    {
        return $this->rules;
    }

    protected $rulesRoleUser = [
        // 'handle_by' => 'nullable|string|in:plant1,plant2',
        'report_no' => 'required|string|max:255',
        'report_date' => 'required|date',
        'wr_mr' => 'required|string|max:255',
        'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
        'qty_vdc_claim' => 'required|integer',
        // 'user_id' => 'required|exists:users,id',
        'unit_id' => 'required|exists:units,id',
        'picture' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'installation_date' => 'required|date',
        'failure_date' => 'required|date',
        'hm_install' => 'required|string|max:255',
        'hm_failure' => 'required|string|max:255',
        'failure_info' => 'required|string|max:255',
        'pdf_vdc_claim' => 'nullable|file',
    ];
    
    public function getRulesRoleUser()
    {
        return $this->rulesRoleUser;
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function vdcCatalog()
    {
        return $this->belongsTo(VDCMaster::class, 'v_d_c_master_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function deptHead()
    {
        return $this->belongsTo(User::class, 'user_depthead', 'id');
    }
    
}
