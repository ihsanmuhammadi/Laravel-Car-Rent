<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

// Nama: Ihsan Muhammad Iqbal
// NIM: 6706220123
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaksi.daftarTransaksi');
    }

    public function getAllTransactions()
    {
        $transactions = DB::table('transactions as t')
        ->select(
            't.id as id',
            'u.name as peminjam',
            'v.name as kendaraan',
            't.startDate as start',
            't.endDate as end',
            't.price as price',
            't.status as status',
            DB::raw('(CASE WHEN t.status="1" THEN "Pinjam"
                WHEN t.status="2" THEN "Kembali"
                WHEN t.status="3" THEN "Hilang"
                END) as status'
            ),
        )
        ->join('users as u', 't.userId', '=', 'u.id')
        ->join('vehicles as v', 't.vehicleId', '=', 'v.id')
        ->orderBy('t.startDate', 'asc')
        ->get();

        return Datatables::of($transactions)
        ->addColumn('aksi', function ($transaction) {
            $html = '
            <a class="waves-effect btn btn-success" href="'.url('transaksiKembali')."/".$transaction->id.'"><a class="material-icons">
            </a>';
            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        $vehicles = Vehicle::get();
        return view('transaksi.peminjaman', compact('users', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idPeminjam' => 'required|integer|gt:0',
            'jenisKendaraan' => 'required|integer|gt:0'
        ], [
            'idPeminjam.gt' => 'Pilih satu species',
            'jenisKendaraan.gt' => 'Pilih jenis kendaraan'
        ]);

        // Calculate the duration in days
        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);
        $durationInDays = $endDate->diffInDays($startDate);

        // Retrieve the price from the vehicle table
        $vehicle = Vehicle::find($request->jenisKendaraan);
        $vehiclePrice = $vehicle->dailyPrice;

        // Calculate the total price
        $totalPrice = $vehiclePrice * $durationInDays;

         // Membuat 1 object transaction dan simpan ke dalam tabel transactions
         $transaction = new Transaction;
         $transaction->userId = $request->idPeminjam;
         $transaction->vehicleId = $request->jenisKendaraan;
         $transaction->startDate = $request->startDate;
         $transaction->endDate = $request->endDate;
         $transaction->price = $totalPrice;
         $transaction->status = 1;
         $transaction->save();

         return redirect()->route('transaksi')->with('status', 'Peminjaman berhasil!');
    }

    public function transaksiKembali($id)
    {
        $transaction = DB::table('transactions as t')
        ->select(
            't.id as id',
            'u.name as name',
            'v.name as kendaraan',
            't.startDate as start',
            't.endDate as end',
            't.price as price',
            't.status as status'
        )
        ->join('users as u', 't.userId', '=', 'u.id')
        ->join('vehicles as v', 't.vehicleId', '=', 'v.id')
        ->where('t.id', '=', $id)
        ->first();

        return view('transaksi.pengembalian', compact('transaction'));
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
    public function update(Request $request)
    {
        $affected = DB::table('transactions')
        ->where('id', $request->id)
        ->update([
                'status' => $request->status,
            ]);
            $transaction = Transaction::where('id', $request->id)->first();
            return redirect('transaksi/')->with('transaction', $transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
