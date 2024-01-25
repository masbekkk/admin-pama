<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getUnits()
    {
        try {
            $units = Unit::all();
            return response()->json([
                'status' => 'success',
                'message' => 'units retrieved Successfully!',
                'data' => $units
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            Log::error('Error retrieving units: ' . $e->getMessage());
            throw $e;
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve units',
                'data' => null,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function index()
    {
        return view('admin.units.index');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        try {
            $unit->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Unit deleted Successfully!',
                'data' => null,
            ], Response::HTTP_OK);

        } catch (Exception $e) {
            Log::error('Error deleting Unit: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete Unit',
                'data' => null,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
