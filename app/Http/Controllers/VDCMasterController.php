<?php

namespace App\Http\Controllers;

use App\Models\VDCMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $newVDCMaster = new VDCMaster();
        $newVDCMaster->stock_code_vdc = $request->stock_code_vdc;
        $newVDCMaster->stock_code_vdc_claim = $request->stock_code_claim;
        $newVDCMaster->item_desc = $request->item_desc;
        $newVDCMaster->mnem_onic = $request->mnem_onic;
        $newVDCMaster->part_number = $request->part_number;
        if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('Y-m-dH:i') . '_' .$file->getClientOriginalName();
            $folderName = 'vdc_master_picture';
            $file->move(public_path($folderName . '/'), $filename);
            $newVDCMaster->picture = $folderName . '/' . $filename;
        }
        $newVDCMaster->type_of_item = $request->type_of_item;
        $newVDCMaster->supplier = $request->supplier;
        $newVDCMaster->uoi = $request->uoi;
        $newVDCMaster->price_damage_core = $request->price_damage_core;
        $newVDCMaster->price_product_genuine = $request->price_product_genuine;
        $newVDCMaster->price_total = $request->price_total;
        $newVDCMaster->warranty_time_guarantee = $request->warranty_time_guarantee;
        $newVDCMaster->claim_method = $request->claim_method;
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
