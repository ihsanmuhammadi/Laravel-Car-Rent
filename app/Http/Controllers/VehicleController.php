<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;

// NIM: 6706220123
// Nama: Ihsan Muhammad Iqbal

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kendaraan.daftarKendaraan');
    }

    public function getAllVehicles()
    {
        $vehicles = DB::table('vehicles as v')
        ->select(
            'v.id as id',
            'v.name as name',
            't.name as type',
            'v.license as license',
            'v.dailyPrice as dailyPrice'
        )
        ->join('types as t', 'v.typeId', '=', 't.id')
        ->orderBy('v.name', 'asc')
        ->get();

        return Datatables::of($vehicles)
        ->make(true);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
