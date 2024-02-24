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
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class VDCClaimController extends Controller
{
    public function __construct()
    {
        $this->middleware('not_depthead')->except(['getVDCClaim', 'index', 'edit', 'updateFromDeptHead']);
    }
    /**
     * Display a listing of the resource.
     */
    public function getVDCClaim()
    {
        try {
            $VDCClaim = VDCClaim::with('vdcCatalog', 'user', 'unit', 'deptHead')->get();
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
        $deptHead = User::where('role', 'depthead')->get();
        return view('admin.vdc_claim.add', compact('catalogVDC', 'units', 'deptHead'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->user);
        $validatedData = $request->validate([
            // 'handle_by' => 'nullable|string|in:plant1,plant2',
            'report_no' => 'required|string|max:255',
            'report_date' => 'required|date',
            'wr_mr' => 'required|string|max:255',
            'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
            'qty_vdc_claim' => 'required|integer',
            // 'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        if ($request->hasFile('report_delivery')) {
            $pdfPath = $request->file('report_delivery')->store('report_delivery_picture', 'public');
            $validatedData['report_delivery'] = 'storage/' . $pdfPath;
        }
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['user_depthead'] = $request->handle_by;
        VDCClaim::create($validatedData);
        return redirect()->route('vdc_claim.index')->with('toast_success', 'Task Created Successfully!');
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
        $message = '';
        if (Auth::user()->role === 'depthead' && $vDCClaim->user_depthead === Auth::user()->id) {
            $message = 'Please Make Approval or Remarks on this VDC Claim';
            Alert::toast($message, 'info');
        } else if (Auth::user()->role === 'depthead') {
            $message = 'You Can\'t Make Approval or Remarks on this VDC Claim';
            Alert::toast($message, 'info');
        }
        $deptHead = User::where('role', 'depthead')->get();
        $catalogVDC = VDCMaster::get(['id', 'stock_code_vdc', 'part_number']);
        // $users = User::get(['id', 'name']);
        $units = Unit::get(['id', 'unit_name', 'unit_code_number']);

        return view('admin.vdc_claim.edit', compact('vDCClaim', 'catalogVDC', 'units', 'deptHead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VDCClaim $vDCClaim)
    {
        $validatedData = $request->validate([
            // 'handle_by' => 'nullable|string|in:plant1,plant2',
            'report_no' => 'required|string|max:255',
            'report_date' => 'required|date',
            'wr_mr' => 'required|string|max:255',
            'ex_po' => 'nullable|string|max:255',
            'v_d_c_master_id' => 'required|exists:v_d_c_masters,id',
            'qty_vdc_claim' => 'required|integer',
            // 'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'installation_date' => 'required|date',
            'failure_date' => 'required|date',
            'hm_install' => 'required|string|max:255',
            'hm_failure' => 'required|string|max:255',
            'failure_info' => 'required|string|max:255',
            'approval_depthead' => 'nullable|string|in:approve,reject',
            'remarks_depthead' => 'nullable|string|max:255',
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
            'report_delivery' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('vdc_claim_pictures', 'public');
            $validatedData['picture'] = 'storage/' . $picturePath;
            $oldPicture = $vDCClaim->picture;
            if (File::exists(public_path($oldPicture))) {
                File::delete(public_path($oldPicture));
            }
        }
        if ($request->hasFile('pdf_vdc_claim')) {
            $pdfPath = $request->file('pdf_vdc_claim')->store('vdc_claim_pdf', 'public');
            $validatedData['pdf_vdc_claim'] = 'storage/' . $pdfPath;
            $oldDoc = $vDCClaim->pdf_vdc_claim;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
        }
        if ($request->hasFile('report_delivery')) {
            $pdfPath = $request->file('report_delivery')->store('report_delivery_picture', 'public');
            $validatedData['report_delivery'] = 'storage/' . $pdfPath;
            $oldDoc = $vDCClaim->report_delivery;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
        }
        $validatedData['user_id'] = Auth::user()->id;
        // if ($request->approval_depthead != null || $request->remarks_depthead != null) {
        //     $validatedData['user_depthead'] = Auth::user()->id;
        // }
        // $validatedData['user_depthead'] = $request->handle_by;
        $vDCClaim->update($validatedData);
        return redirect()->route('vdc_claim.index')->with('toast_success', 'Task Updated Successfully!');
    }

    public function updateFromDeptHead(VDCClaim $vDCClaim, Request $request)
    {
        // dd($vDCClaim);
        $validatedData = $request->validate([
            'approval_depthead' => 'nullable|string|in:approve,reject',
            'remarks_depthead' => 'nullable|string|max:255',
        ]);

        $vDCClaim->update($validatedData);
        return redirect()->route('vdc_claim.index')->with('toast_success', 'Updated By DeptHead Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VDCClaim $vDCClaim)
    {
        try {
            $oldPicture = $vDCClaim->picture;
            if (File::exists(public_path($oldPicture))) {
                File::delete(public_path($oldPicture));
            }
            $oldDoc = $vDCClaim->pdf_vdc_claim;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
            $oldDoc = $vDCClaim->report_delivery;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
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
