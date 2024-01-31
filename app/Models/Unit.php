<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    // protected $guarded = []; 
    protected $fillable = ['unit_name', 'product_maker', 'unit_type', 'unit_code_number', 'unit_serial_number', 'engine_model', 'engine_mnemonic', 'engine_serial_model'];

    public function vdcClaim()
    {
        return $this->hasMany(VDCClaim::class, 'unit_id', 'id');
    }
}
