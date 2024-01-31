<?php

namespace App\Http\Controllers;

use App\Models\VDCMaster;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class VDCMasterController extends Controller
{
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
        // $inputData = $request->all();

        // // Loop through all input fields
        // foreach ($inputData as $key => $value) {
        //     // Check if the value is a string and exclude file inputs
        //     if (is_string($value) && (Str::before($key, '_') !== 'price' || $key !== 'picture' || $key !== 'claim_document')) {
        //         Validator::make([$key => $value], [
        //             $key => ['required', 'string', 'max:255',  function ($attribute, $value, $fail) {
        //                 // Additional custom check for SQL injection prevention
        //                 if (preg_match('/["\'=]/', $value)) {
        //                     $fail("The $attribute field contains invalid characters.");
        //                 }
        //             }],
        //         ]);
        //         // Convert the string to uppercase
        //         $inputData[$key] = strtoupper($value);
        //     }
        // }
        $newVDCMaster = $request->validate([
            'stock_code_vdc' => 'required|string|max:255',
            'stock_code_vdc_claim' => 'required|string|max:255',
            'picture' => 'required|image|max:2048', 
            'item_name' => 'required|string|max:255',
            'mnemonic' => 'required|string|max:255',
            'part_number' => 'required|string|max:255',
            'type_of_item' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'supplier_address' => 'required|string|max:255',
            'uoi' => 'required|string|max:255',
            'price_damage_core' => 'required|numeric_with_thousand_separator',
            'price_product_genuine' => 'required|numeric_with_thousand_separator',
            'price_total' => 'required|numeric_with_thousand_separator',
            'warranty_time_guarantee' => 'required|string|max:255',
            'claim_method' => 'required|in:CWP,BUY BACK',
            'claim_document' => 'required|file|max:2048',
        ]);

        // Create a new VDCMaster instance with the transformed data
        
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
        // if ($request->file('claim_document')) {
        //     $file = $request->file('claim_document');
        //     $filename = date('Y-m-dH:i') . '_' . $file->getClientOriginalName();
        //     $folderName = 'vdc_master_claim_document';
        //     $file->move(public_path($folderName . '/'), $filename);
        //     $newVDCMaster->claim_document = $folderName . '/' . $filename;
        // }
        // Save the model
        // $newVDCMaster->save();
        // dd($newVDCMaster->id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VDCMaster $vDCMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VDCMaster $vDCMaster)
    {
        try {
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
