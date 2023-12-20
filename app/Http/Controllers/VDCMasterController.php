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
        $newVDCMaster->stock_code = $request->stock_code;
        $newVDCMaster->stock_code_pnd = $request->stock_code_pnd;
        $newVDCMaster->stock_code_pnw = $request->stock_code_pnw;
        $newVDCMaster->item_name = $request->item_name;
        $newVDCMaster->part_number = $request->part_number;
        $newVDCMaster->mnem_onic = $request->mnem_onic;
        if($request->file('foto')){
            $file= $request->file('foto');
            $filename= date('Y-m-dH:i') . '_' .$file->getClientOriginalName();
            $folderName = 'vdc_master_foto';
            $file->move(public_path($folderName . '/'), $filename);
            $newVDCMaster->foto = $folderName . '/' . $filename;
        }
        $newVDCMaster->supplier = $request->supplier;
        $newVDCMaster->price_damage_core = $request->price_damage_core;
        $newVDCMaster->waktu_klaim = $request->waktu_klaim;
        $newVDCMaster->metode = $request->metode;
        $newVDCMaster->save();

        // $newVDCMaster->fill($request->all());
        // $result = $newVDCMaster->save();

        return response()->json(['message' => 'VDC Master Data Berhasil Ditambahkan!'], 200);


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
