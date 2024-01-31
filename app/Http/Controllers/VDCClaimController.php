<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\VDCClaim;
use App\Models\VDCMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
            $VDCClaim = VDCClaim::with('vdcCatalog', 'user', 'unit')->get();
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
        return view('admin.vdc_claim.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $catalogVDC = VDCMaster::get(['id', 'stock_code_vdc', 'part_number']);
        // $users = User::get(['id', 'name']);
        $units = Unit::get(['id', 'unit_name', 'unit_code_number']);
        return view('admin.vdc_claim.add', compact('catalogVDC', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
        $validatedData = $request->validate([
            'report_no' => 'required|string|max:255',
            'report_date' => 'required|date',
            'wr_mr' => 'required|string|max:255',
            'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
            'qty_vdc_claim' => 'required|integer',
            // 'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
        ]);

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('vdc_claim_pictures', 'public');
            $validatedData['picture'] = 'storage/' . $picturePath;
        }
        if ($request->hasFile('pdf_vdc_claim')) {
            $pdfPath = $request->file('pdf_vdc_claim')->store('vdc_claim_pdf', 'public');
            $validatedData['pdf_vdc_claim'] = 'storage/' . $pdfPath;
        }
        $validatedData['user_id'] = Auth::user()->id;
        $newVDCCLaim = VDCClaim::create($validatedData);
        return redirect()->route('vdc_claim.index')->with('toast_success', 'Task Created Successfully!');
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'VDC Claim created Successfully!',
        //     'data' => $newVDCCLaim,
        // ], Response::HTTP_CREATED);

        // } catch (ValidationException $errValidation) {
        //     return response()->json(['errors' => $errValidation->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        // } catch (Exception $e) {

        //     Log::error('Error creating VDC Claim: ' . $e->getMessage());
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Failed to create VDC Claim',
        //         'data' => null,
        //         'errors' => $e->getMessage()
        //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
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
        // dd($vDCClaim);
        $catalogVDC = VDCMaster::get(['id', 'stock_code_vdc', 'part_number']);
        // $users = User::get(['id', 'name']);
        $units = Unit::get(['id', 'unit_name', 'unit_code_number']);
        return view('admin.vdc_claim.edit', compact('vDCClaim', 'catalogVDC', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VDCClaim $vDCClaim)
    {
        $validatedData = $request->validate([
            'report_no' => 'required|string|max:255',
            'report_date' => 'required|date',
            'wr_mr' => 'required|string|max:255',
            'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
            'qty_vdc_claim' => 'required|integer',
            // 'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
        ]);

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('vdc_claim_pictures', 'public');
            $validatedData['picture'] = 'storage/' . $picturePath;
        }
        if ($request->hasFile('pdf_vdc_claim')) {
            $pdfPath = $request->file('pdf_vdc_claim')->store('vdc_claim_pdf', 'public');
            $validatedData['pdf_vdc_claim'] = 'storage/' . $pdfPath;
        }
        $validatedData['user_id'] = Auth::user()->id;
        $vDCClaim->update($validatedData);
        return redirect()->route('vdc_claim.index')->with('toast_success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VDCClaim $vDCClaim)
    {
        try {
            $vDCClaim->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'VDC Claim deleted Successfully!',
                'data' => null,
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error('Error deleting VDC Claim: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete Data VDC Claim',
                'data' => null,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
