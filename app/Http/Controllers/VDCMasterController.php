<?php

namespace App\Http\Controllers;

use App\Models\VDCMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class VDCMasterController extends Controller
{
    public function __construct()
    {
       $this->middleware('not_depthead')->except(['getVdcMaster', 'index']);
    }
    /**
     * Display a listing of the resource.
     */
    function getVdcMaster()
    {
        $data = VDCMaster::all();
        return response()->json(['data' => $data], 200);
    }
    /**
     * Display a listing of the resource to view.
     */
    public function index()
    {
        return view('admin.vdc_master.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vdc_master.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newVDCMaster = $request->validate([
            'stock_code_vdc' => 'nullable|string|max:255',
            'stock_code_vdc_claim' => 'nullable|string|max:255',
            'picture' => 'nullable|image|max:2048', 
            'item_name' => 'nullable|string|max:255',
            'mnemonic' => 'nullable|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'type_of_item' => 'nullable|string|max:255',
            'supplier' => 'nullable|string|max:255',
            'supplier_address' => 'nullable|string|max:255',
            'uoi' => 'nullable|string|max:255',
            'price_damage_core' => 'nullable|numeric_with_thousand_separator',
            'price_product_genuine' => 'nullable|numeric_with_thousand_separator',
            'price_total' => 'nullable|numeric_with_thousand_separator',
            'warranty_time_guarantee' => 'nullable|string|max:255',
            'claim_method' => 'nullable|in:CWP,BUY BACK',
            'claim_document' => 'nullable|file|max:2048',
        ]);
        
        $newVDCMaster['price_damage_core'] = parseThousandSeparatorToFloat($request->price_damage_core);
        $newVDCMaster['price_product_genuine'] = parseThousandSeparatorToFloat($request->price_product_genuine);
        $newVDCMaster['price_total'] = parseThousandSeparatorToFloat($request->price_total);
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('vdc_master_pictures', 'public');
            $newVDCMaster['picture'] = 'storage/' . $picturePath;
        }
        if ($request->hasFile('claim_document')) {
            $claim_documentPath = $request->file('claim_document')->store('vdc_claim_claim_documents', 'public');
            $newVDCMaster['claim_document'] = 'storage/' . $claim_documentPath;
        }
        VDCMaster::create($newVDCMaster);
        return redirect('vdc_master')->with('toast_success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VDCMaster $vDCMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VDCMaster $vDCMaster)
    {
        return view('admin.vdc_master.edit', compact('vDCMaster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VDCMaster $vDCMaster)
    {
        $updatevDCMaster = $request->validate([
            'stock_code_vdc' => 'nullable|string|max:255',
            'stock_code_vdc_claim' => 'nullable|string|max:255',
            'picture' => 'nullable|image|max:2048', 
            'item_name' => 'nullable|string|max:255',
            'mnemonic' => 'nullable|string|max:255',
            'part_number' => 'nullable|string|max:255',
            'type_of_item' => 'nullable|string|max:255',
            'supplier' => 'nullable|string|max:255',
            'supplier_address' => 'nullable|string|max:255',
            'uoi' => 'nullable|string|max:255',
            'price_damage_core' => 'nullable|numeric_with_thousand_separator',
            'price_product_genuine' => 'nullable|numeric_with_thousand_separator',
            'price_total' => 'nullable|numeric_with_thousand_separator',
            'warranty_time_guarantee' => 'nullable|string|max:255',
            'claim_method' => 'nullable|in:CWP,BUY BACK',
            'claim_document' => 'nullable|file|max:2048',
        ]);
        
        $updatevDCMaster['price_damage_core'] = parseThousandSeparatorToFloat($request->price_damage_core);
        $updatevDCMaster['price_product_genuine'] = parseThousandSeparatorToFloat($request->price_product_genuine);
        $updatevDCMaster['price_total'] = parseThousandSeparatorToFloat($request->price_total);
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('vdc_master_pictures', 'public');
            $updatevDCMaster['picture'] = 'storage/' . $picturePath;
            $oldPicture = $vDCMaster->picture;
            if (File::exists(public_path($oldPicture))) {
                File::delete(public_path($oldPicture));
            }
        }
        if ($request->hasFile('claim_document')) {
            $claim_documentPath = $request->file('claim_document')->store('vdc_claim_claim_documents', 'public');
            $updatevDCMaster['claim_document'] = 'storage/' . $claim_documentPath;
            $oldDoc = $vDCMaster->claim_document;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
        }
        $vDCMaster->update($updatevDCMaster);
        return redirect('vdc_master')->with('toast_success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VDCMaster $vDCMaster)
    {
        try {
            $oldPicture = $vDCMaster->picture;
            if (File::exists(public_path($oldPicture))) {
                File::delete(public_path($oldPicture));
            }
            $oldDoc = $vDCMaster->claim_document;
            if (File::exists(public_path($oldDoc))) {
                File::delete(public_path($oldDoc));
            }
            $vDCMaster->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'VDC Catalog deleted Successfully!',
                'data' => null,
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error('Error deleting VDC Catalog: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete Data VDC Catalog',
                'data' => null,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
