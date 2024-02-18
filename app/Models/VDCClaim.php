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
        // Add other columns as needed
    ];

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
