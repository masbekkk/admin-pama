<?php

namespace App\Http\Controllers;

use App\Models\VDCMaster;
use Illuminate\Http\Request;
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

    public function storeOld(Request $request)
    {
        // dd($this->parseThousandSeparatorToFloat($request->price_total));
        $newVDCMaster = new VDCMaster();
        $newVDCMaster->stock_code_vdc = $request->stock_code_vdc;
        $newVDCMaster->stock_code_vdc_claim = $request->stock_code_claim;
        $newVDCMaster->item_name = $request->item_desc;
        $newVDCMaster->mnemonic = $request->mnem_onic;
        $newVDCMaster->part_number = $request->part_number;
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('Y-m-dH:i') . '_' . $file->getClientOriginalName();
            $folderName = 'vdc_master_picture';
            $file->move(public_path($folderName . '/'), $filename);
            $newVDCMaster->picture = $folderName . '/' . $filename;
        }
        $newVDCMaster->type_of_item = $request->type_of_item;
        $newVDCMaster->supplier = $request->supplier;
        $newVDCMaster->supplier_address = $request->supplier_address;
        $newVDCMaster->uoi = $request->uoi;
        $newVDCMaster->price_damage_core = $this->parseThousandSeparatorToFloat($request->price_damage_core);
        $newVDCMaster->price_product_genuine = $this->parseThousandSeparatorToFloat($request->price_product_genuine);
        $newVDCMaster->price_total = $this->parseThousandSeparatorToFloat($request->price_total);
        $newVDCMaster->warranty_time_guarantee = $request->warranty_time_guarantee;
        $newVDCMaster->claim_method = $request->claim_method;
        if ($request->file('claim_document')) {
            $file = $request->file('claim_document');
            $filename = date('Y-m-dH:i') . '_' . $file->getClientOriginalName();
            $folderName = 'vdc_master_claim_document';
            $file->move(public_path($folderName . '/'), $filename);
            $newVDCMaster->claim_document = $folderName . '/' . $filename;
        }
        $newVDCMaster->save();

        // $newVDCMaster->fill($request->all());
        // $result = $newVDCMaster->save();
        return redirect('vdc_master')->with('toast_success', 'Task Created Successfully!');
        // return response()->json(['message' => 'VDC Master Data Berhasil Ditambahkan!'], 200);


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
        //
    }
}
