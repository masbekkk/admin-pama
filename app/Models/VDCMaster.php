<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VDCMaster extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'stock_code_vdc',
        'stock_code_vdc_claim',
        'item_name',
        'mnemonic',
        'part_number',
        'type_of_item',
        'supplier',
        'supplier_address',
        'uoi',
        'price_damage_core',
        'price_product_genuine',
        'price_total',
        'warranty_time_guarantee',
        'claim_method',
        'picture',
        'claim_document'
    ];


    public function vdcClaim()
    {
        return $this->hasMany(VDCClaim::class, 'id', 'v_d_c_master_id');
    }
}
