<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\VDCClaim;
use App\Models\VDCMaster;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
       
        // $data = [
        //     'qty_vdc_claim' => 0,
        //     'qty_claim_approved' => 0,
        //     'qty_claim_rejected' => 0,
        //     'qty_outstanding' => 0,
        //     'lt_create_cwp' => 0,
        // ];
        
        // foreach ($vdcClaim as $value) {
        //     // dd(countBetweenTwoDates($value->date_send_to_supplier ?? Carbon::now(), $value->report_date));
        //     $data['qty_vdc_claim'] += $value->qty_vdc_claim;
        //     $data['qty_claim_approved'] += $value->qty_claim_approved;
        //     $data['qty_claim_rejected'] += $value->qty_claim_rejected;
        //     $data['qty_outstanding'] += ($value->qty_vdc_claim - $value->qty_claim_approved);
        //     $data['lt_create_cwp'] += countBetweenTwoDates($value->date_send_to_supplier ?? Carbon::now(), $value->report_date);
        // }

        // return $data;

        $users = User::where('role', '!=', 'admin')->count();
        $vdcCatalog = VDCMaster::count();
        $unit = Unit::count();
        $vdcClaim = VDCClaim::count();
        return view('admin.dashboard.index', compact('users', 'vdcCatalog', 'unit', 'vdcClaim'));
        // dd($users);
    }

    public function getDashboardData()
    {
        try {
            $vdcClaim = VDCClaim::all();
            return response()->json([
                'status' => 'success',
                'message' => 'vdc claim retrieved Successfully!',
                'data' => $vdcClaim
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            Log::error('Error retrieving vdc claim: ' . $e->getMessage());
            throw $e;
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve units',
                'data' => null,
                'errors' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
