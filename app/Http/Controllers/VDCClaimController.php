<?php

namespace App\Http\Controllers;

use App\Models\VDCClaim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class VDCClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getVDCClaim()
    {
        try {
            $VDCClaim = VDCClaim::all();
            return response()->json([
                'status' => 'success',
                'message' => 'VDC Claim retrieved Successfully!',
                'data' => $VDCClaim
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            Log::error('Error retrieving VDC Claim: ' . $e->getMessage());
            throw $e;
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve VDC Claim',
                'data' => null,
                'errors' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'report_no' => 'required|string|max:255',
                'report_date' => 'required|date',
                'wr_mr' => 'required|string|max:255',
                'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
                'qty_vdc_claim' => 'required|integer',
                'user_id' => 'required|exists:users,id',
                'unit_id' => 'required|exists:units,id',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'installation_date' => 'required|date',
                'failure_date' => 'required|date',
                'hm_install' => 'required|string|max:255',
                'hm_failure' => 'required|string|max:255',
                'failure_info' => 'required|string|max:255',
                'pdf_vdc_claim' => 'required|string|max:255',
                'purchase_order' => 'required|string|max:255',
                'date_send_to_supplier' => 'required|date',
                'date_received_supplier' => 'required|date',
                'supplier_analysis' => 'required|string|max:255',
                'status_claim' => 'required|in:approve,reject',
                'date_claim_status' => 'required|date',
                'qty_claim_approved' => 'required|integer',
                'qty_claim_rejected' => 'required|integer',
                'remarks' => 'nullable|string|max:255',
            ]);

            if ($request->hasFile('picture')) {
                $picturePath = $request->file('vdc_claim_pictures')->store('pictures', 'public');
                $validatedData['picture'] = $picturePath;
            }

            $newVDCCLaim = VDCClaim::create($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'VDC Claim created Successfully!',
                'data' => $newVDCCLaim,
            ], Response::HTTP_CREATED);

        } catch (ValidationException $errValidation) {
            return response()->json(['errors' => $errValidation->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (Exception $e) {

            Log::error('Error creating VDC Claim: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create VDC Claim',
                'data' => null,
                'errors' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(VDCClaim $vDCClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VDCClaim $vDCClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VDCClaim $vDCClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VDCClaim $vDCClaim)
    {
        //
    }
}
