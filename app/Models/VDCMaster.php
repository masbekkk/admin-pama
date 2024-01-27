<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VDCMaster extends Model
{
    use HasFactory;

    // protected $guarded = [];
    // protected $fillable = ['_token'];

    public function vdcClaim()
    {
        return $this->belongsTo(VDCClaim::class, 'id', 'v_d_c_master_id');
    }
}
